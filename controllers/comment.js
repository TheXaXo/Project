const Article = require('mongoose').model('Article');
const User = require('mongoose').model('User');
const Comment = require('mongoose').model('Comment');

module.exports = {
    createGet: (req, res) => {
        let id = req.params.id;

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
            }

            res.render('comment/create', {article: article});
        })
    },

    createPost: (req, res) => {
        let id = req.params.id;

        let currentUser = req.user;
        if (!currentUser) {
            res.redirect('/');
        }

        Article.findById(id).then(article => {
            if (!article) {
                res.redirect('/');
            }

            let commentArgs = req.body;

            let errorMsg = '';

            if (!commentArgs.content) {
                errorMsg = 'Missing content!'
            } else if (commentArgs.content.length > 255) {
                errorMsg = 'Comment should not be longer than 255 characters!'
            }

            if (errorMsg) {
                res.render('comment/create', {error: errorMsg});
            }

            commentArgs.article = article.id;
            commentArgs.user = req.user.id;

            Comment.create(commentArgs).then(comment => {
                article.comments.push(comment.id);
                currentUser.comments.push(comment.id);

                article.save();
                currentUser.save();

                res.redirect('/article/details/' + id)
            })
        })
    },

    upvote: (req, res) => {
        let id = req.params.id;

        let user = req.user;

        if (!user) {
            res.redirect('/');
        }

        Comment.findById(id).then(comment => {
            if (!comment) {
                res.redirect('/');
            }

            if (user.upvotedComments.indexOf(id) === -1) {
                if (user.downvotedComments.indexOf(id) === -1) {
                    user.upvotedComments.push(id);
                    comment.upvotes.push(user.id);
                } else {
                    user.downvotedComments.remove(id);
                    comment.downvotes.remove(user.id);
                    user.upvotedComments.push(id);
                    comment.upvotes.push(user.id);
                }

            } else {
                user.upvotedComments.remove(id);
                comment.upvotes.remove(user.id);
            }

            user.save();
            comment.save();
            res.redirect('/article/details/' + comment.article);
        })
    },

    downvote: (req, res) => {
        let id = req.params.id;

        let user = req.user;

        if (!user) {
            res.redirect('/');
        }

        Comment.findById(id).then(comment => {
            if (!comment) {
                res.redirect('/');
            }

            if (user.downvotedComments.indexOf(id) === -1) {
                if (user.upvotedComments.indexOf(id) === -1) {
                    user.downvotedComments.push(id);
                    comment.downvotes.push(user.id);
                } else {
                    user.upvotedComments.remove(id);
                    comment.upvotes.remove(user.id);
                    user.downvotedComments.push(id);
                    comment.downvotes.push(user.id);
                }

            } else {
                user.downvotedComments.remove(id);
                comment.downvotes.remove(user.id);
            }

            user.save();
            comment.save();
            res.redirect('/article/details/' + comment.article);
        })
    },

    delete: (req, res) => {
        let id = req.params.id;

        let user = req.user;

        if (!user) {
            res.redirect('/');
            return;
        }

        Comment.findById(id).populate('user').then(comment => {
                req.user.isInRole('Admin').then(isAdmin => {
                    if (!isAdmin && comment.user.id !== user.id) {
                        res.redirect('/');
                    } else {
                        comment.prepareDelete();
                        comment.remove();

                        res.redirect('/article/details/' + comment.article);
                    }
                });
            }
        )
    }
}
;