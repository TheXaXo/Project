const size = require('image-size');
var path = require('path');
const fs = require('fs');
const Article = require('mongoose').model('Article');
const Category = require('mongoose').model('Category');
const User = require('mongoose').model('User');
const Report = require('mongoose').model('Report');
const Comment = require('mongoose').model('Comment');
const dateFormat = require('dateformat');

module.exports = {
    createGet: (req, res) => {
        if (!req.isAuthenticated()) {
            let returnUrl = '/article/create';
            req.session.returnUrl = returnUrl;

            res.redirect('/user/login');
        }

        Category.find({}).then(categories => {
            res.render('article/create', {categories: categories});
        })
    },

    createPost: (req, res) => {
        let articleArgs = req.body;
        let file = req.file;
        let dimensions = size(file.path);
        let errorMsg = '';

        if (!req.isAuthenticated()) {
            errorMsg = 'You should be logged in to make articles!'
        } else if (!req.file) {
            errorMsg = 'Invalid file!'
        } else if (!articleArgs.tagNames) {
            errorMsg = 'Missing tags!';
            fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
        } else if (dimensions.width < 600 && dimensions.height < 400) {
            errorMsg = 'Image too small!';
            fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
        } else if (dimensions.width > 10000 && dimensions.height > 8000) {
            errorMsg = 'Image too big!';
            fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
        }

        if (errorMsg) {
            res.render('article/create', {error: errorMsg});
            return;
        }

        articleArgs.imgName = file.filename;

        articleArgs.width = dimensions.width;
        articleArgs.height = dimensions.height;

        articleArgs.author = req.user.id;
        Article.create(articleArgs).then(article => {
            let tagNames = articleArgs.tagNames.split(/\s+|,/).filter(tag => {
                return tag;
            });

            article.tags = tagNames;
            article.save();

            article.prepareInsert();
            res.redirect('/');
        });
    },

    details: (req, res) => {
        let id = req.params.id;

        let currentSort = req.query.sort;
        if (!currentSort) {
            currentSort = 'rating'
        }

        // Yes, it's a valid ObjectId, proceed with `findById` call.
        if (!id.match(/^[0-9a-fA-F]{24}$/)) {
            res.redirect('/');
            return;
        }

        Article.findById(id).populate('author').then(article => {
            article.views += 1;
            article.save();

            let articleComments = [];

            Comment.find({}).populate('user').then(allComments => {
                for (let comment of allComments) {
                    if (article.comments.indexOf(comment.id) !== -1) {

                        comment.author = comment.user;
                        comment.rating = comment.upvotes.length - comment.downvotes.length;
                        comment.dateString = dateFormat(comment.date, "mm/dd/yyyy HH:MM:ss");

                        if (comment.author.id === article.author.id) {
                            comment.isMarked = true;
                        }

                        if (req.user) {
                            req.user.isInRole('Admin').then(isAdmin => {
                                if (isAdmin || comment.user.id === req.user.id) {
                                    comment.isAuthorizedToDelete = true;
                                }
                            });

                            if (req.user.upvotedComments.indexOf(comment.id) !== -1) {
                                comment.isUpvoted = true;
                            } else if (req.user.downvotedComments.indexOf(comment.id) !== -1) {
                                comment.isDownvoted = true;
                            }
                        }

                        articleComments.push(comment);
                    }
                }

                article.commentsCount = articleComments.length;

                if (currentSort === 'rating') {
                    articleComments = articleComments
                        .sort(function (a, b) {
                            if (a.rating > b.rating) return -1;
                            if (a.rating < b.rating) return 1;
                        });
                } else {
                    articleComments = articleComments
                        .reverse();
                }
            });

            if (!req.user) {
                res.render('article/details', {
                    article: article,
                    isUserAuthorized: false,
                    comments: articleComments
                });
                return;
            }

            let isSaved = false;
            if (req.user.savedArticles.indexOf(id) !== -1) {
                isSaved = true;
            }

            let isUpvoted = false;
            let isDownvoted = false;

            if (req.user.upvotedArticles.indexOf(id) !== -1) {
                isUpvoted = true;
            }

            if (req.user.downvotedArticles.indexOf(id) !== -1) {
                isDownvoted = true;
            }

            req.user.isInRole('Admin').then(isAdmin => {
                let isUserAuthorized = isAdmin || req.user.isAuthor(article);

                res.render('article/details', {
                    article: article, isUserAuthorized: isUserAuthorized,
                    isSaved: isSaved, isUpvoted: isUpvoted, isDownvoted: isDownvoted,
                    comments: articleComments
                });
            })
        })
    },

    editGet: (req, res) => {
        let id = req.params.id;

        // Yes, it's a valid ObjectId, proceed with `findById` call.
        if (!id.match(/^[0-9a-fA-F]{24}$/)) {
            res.redirect('/');
        }

        if (!req.isAuthenticated()) {
            let returnUrl = `/article/edit/${id}`;
            req.session.returnUrl = returnUrl;

            res.redirect('/user/login');
            return;
        }
        Article.findById(id).then(article => {
            req.user.isInRole('Admin').then(isAdmin => {
                if (!isAdmin && !req.user.isAuthor(article)) {
                    res.redirect('/');
                }

                Category.find({}).then(categories => {
                    article.categories = categories;
                    article.tagNames = article.tags;
                    res.render('article/edit', {article: article});
                });
            });
        });
    },

    editPost: (req, res) => {
        let id = req.params.id;
        let articleArgs = req.body;

        if (!req.isAuthenticated()) {
            let returnUrl = `/article/edit/${id}`;
            req.session.returnUrl = returnUrl;

            res.redirect('/user/login');
            return;
        }

        req.user.isInRole('Admin').then(isAdmin => {
            if (!isAdmin && !req.user.isAuthor(article)) {
                res.redirect('/');
            }
        });

        let errorMsg = '';

        if (!articleArgs.tags) {
            errorMsg = 'Missing tags!'
        }

        if (errorMsg) {
            Article.findById(id).then(article => {
                Category.find({}).then(categories => {
                    article.categories = categories;
                    res.render('article/edit', {error: errorMsg, article: article})
                })
            })
        } else {
            Article.findById(id).populate('category').then(article => {
                if (article.category.id !== articleArgs.category) {
                    article.category.articles.remove(article.id);
                    article.category.save();
                }

                article.category = articleArgs.category;
                article.title = articleArgs.title;
                article.content = articleArgs.content;

                let newTagNames = articleArgs.tags.split(/\s+|,/).filter(tag => {
                    return tag;
                });

                article.tags = newTagNames;

                article.save((err) => {
                    if (err) {
                        console.log(err.message);
                    }

                    Category.findById(article.category).then(category => {
                        if (category.articles.indexOf(article.id) === -1) {
                            category.articles.push(article.id);
                            category.save();
                        }

                        res.redirect(`/article/details/${id}`);
                    })
                })
            })
        }
    },

    deleteGet: (req, res) => {
        let id = req.params.id;

        // Yes, it's a valid ObjectId, proceed with `findById` call.
        if (!id.match(/^[0-9a-fA-F]{24}$/)) {
            res.redirect('/');
            return;
        }

        if (!req.isAuthenticated()) {
            let returnUrl = `/article/edit/${id}`;
            req.session.returnUrl = returnUrl;

            res.redirect('/user/login');
            return;
        }

        Article.findById(id).populate('category').then(article => {
            req.user.isInRole('Admin').then(isAdmin => {
                if (!isAdmin && !req.user.isAuthor(article)) {
                    res.redirect('/');
                }

                article.tagNames = article.tags;

                res.render('article/delete', article)
            });
        })
    },

    deletePost: (req, res) => {
        let id = req.params.id;
        if (!req.isAuthenticated()) {
            let returnUrl = `/article/edit/${id}`;
            req.session.returnUrl = returnUrl;

            res.redirect('/user/login');
            return;
        }

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
                return;
            }
            req.user.isInRole('Admin').then(isAdmin => {
                if (!isAdmin && !req.user.isAuthor(article)) {
                    res.redirect('/');
                } else {
                    Article.findOneAndRemove({_id: id}).populate('author').then(article => {
                        article.prepareDelete();
                        fs.unlink(__dirname + '\\..\\public\\uploads\\' + article.imgName);
                        res.redirect('/');
                    })
                }
            })
        })
    },

    saveArticle: (req, res) => {
        let user = req.user;
        let id = req.params.id;

        if (!user) {
            res.redirect('/user/login');
            return;
        }

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
                return;
            }
            User.findById(user.id).then(currentUser => {
                if (!currentUser) {
                    res.redirect('/user/login');
                    return;
                }
                if (currentUser.savedArticles.indexOf(article.id) === -1) {
                    currentUser.savedArticles.push(article.id);
                } else {
                    currentUser.savedArticles.remove(article.id);
                }
                currentUser.save();
                res.redirect('/article/details/' + article.id);
            })
        })
    },

    reportGet: (req, res) => {
        let user = req.user;
        let id = req.params.id;

        if (!user) {
            res.redirect('/user/login');
            return;
        }

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
                return;
            }

            res.render('article/report', {article: article})
        })
    },

    reportPost: (req, res) => {
        let user = req.user;
        let id = req.params.id;

        if (!user) {
            res.redirect('/user/login');
            return;
        }

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
                return;
            }

            let reportArgs = req.body;
            reportArgs.reportedBy = user.nickname;
            reportArgs.article = id;

            Report.create(reportArgs).then(report => {
                res.redirect('/article/details/' + id)
            })
        })
    },

    downloadGet: (req, res) => {
        let imgName = req.params.imgName;

        Article.findOne({imgName: imgName}).then(article => {
            if (!article) {
                res.redirect('/');
                return;
            }

            let file = __dirname + '/../public/uploads/' + imgName;
            res.download(file);

            article.downloads += 1;
            article.save();
        })
    },

    upvote: (req, res) => {
        let user = req.user;
        let id = req.params.id;

        if (!user) {
            res.redirect('/user/login');
            return;
        }

        Article.findById(id).then(article => {

            if (user.upvotedArticles.indexOf(article.id) === -1) {
                user.upvotedArticles.push(article.id);

                if (user.downvotedArticles.indexOf(article.id) === -1) {
                    article.rating += 1;
                } else if (user.downvotedArticles.indexOf(article.id) !== -1) {
                    user.downvotedArticles.remove(article.id);
                    article.rating += 2;
                }
            } else if (user.upvotedArticles.indexOf(article.id) !== -1) {
                article.rating -= 1;
                user.upvotedArticles.remove(article.id);
            }

            user.save();
            article.save();
            res.redirect('/article/details/' + article.id);
        })
    },

    downvote: (req, res) => {
        let user = req.user;
        let id = req.params.id;

        if (!user) {
            res.redirect('/user/login');
            return;
        }

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
                return;
            }

            if (user.downvotedArticles.indexOf(article.id) === -1) {
                user.downvotedArticles.push(article.id);

                if (user.upvotedArticles.indexOf(article.id) === -1) {
                    article.rating -= 1;
                } else if (user.upvotedArticles.indexOf(article.id) !== -1) {
                    user.upvotedArticles.remove(article.id);
                    article.rating -= 2;
                }
            } else if (user.downvotedArticles.indexOf(article.id) !== -1) {
                article.rating += 1;
                user.downvotedArticles.remove(article.id);
            }

            user.save();
            article.save();
            res.redirect('/article/details/' + article.id);
        })
    }
};