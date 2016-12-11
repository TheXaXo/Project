const User = require('mongoose').model('User');
const Article = require('mongoose').model('Article');
const Role = require('mongoose').model('Role');
const encryption = require('./../utilities/encryption');
const size = require('image-size');
var fs = require('fs');
const dateFormat = require('dateformat');

module.exports = {
    registerGet: (req, res) => {
        res.render('user/register');
    },

    registerPost: (req, res) => {
        let registerArgs = req.body;

        let errorMsg = '';

        User.findOne({nickname: registerArgs.nickname}).then(user => {
            if (user) {
                errorMsg = 'User with the same nickname exists!';
            }
        });

        User.findOne({email: registerArgs.email}).then(user => {
            if (user) {
                errorMsg = 'User with the same email exists!';
            } else if (registerArgs.password !== registerArgs.repeatedPassword) {
                errorMsg = 'Passwords do not match!'
            }

            if (errorMsg) {
                registerArgs.error = errorMsg;
                res.render('user/register', registerArgs)
            } else {
                let salt = encryption.generateSalt();
                let passwordHash = encryption.hashPassword(registerArgs.password, salt);

                let userObject = {
                    email: registerArgs.email,
                    passwordHash: passwordHash,
                    fullName: registerArgs.fullName,
                    birthdate: registerArgs.birthdate,
                    nickname: registerArgs.nickname,
                    avatar: 'default.png',
                    location: registerArgs.location,
                    savedArticles: [],
                    salt: salt
                };

                let roles = [];

                Role.findOne({name: 'User'}).then(role => {
                    roles.push(role.id);
                    userObject.roles = roles;

                    User.create(userObject).then(user => {
                        role.users.push(user);
                        role.save(err => {
                            if (err) {
                                registerArgs.error = err.message;
                                res.render('user/register', registerArgs);
                            } else {
                                req.logIn(user, (err) => {
                                    if (err) {
                                        registerArgs.error = err.message;
                                        res.render('user/register', registerArgs);
                                        return;
                                    }

                                    res.redirect('/')
                                })
                            }
                        })
                    })
                })
            }
        })
    },

    loginGet: (req, res) => {
        res.render('user/login');
    },

    loginPost: (req, res) => {
        let loginArgs = req.body;
        User.findOne({email: loginArgs.email}).then(user => {
            if (!user || !user.authenticate(loginArgs.password)) {
                let errorMsg = 'Either username or password is invalid!';
                loginArgs.error = errorMsg;
                res.render('user/login', loginArgs);
                return;
            }

            req.logIn(user, (err) => {
                if (err) {
                    console.log(err);
                    res.redirect('/user/login', {error: err.message});
                    return;
                }

                let returnUrl = '/';
                if (req.session.returnUrl) {
                    returnUrl = req.session.returnUrl;
                    delete req.session.returnUrl;
                }

                res.redirect(returnUrl);
            })
        })
    },

    logout: (req, res) => {
        req.logOut();
        res.redirect('/');
    },

    getUserPanel: (req, res) => {
        User.findOne({nickname: req.params.nickname}).then(userProfile => {
            if (userProfile) {
                let ownsProfile = false;
                if (req.user && req.user.nickname === userProfile.nickname) {
                    ownsProfile = true;
                }

                userProfile.birthdateString = dateFormat(userProfile.birthdate, "mm/dd/yyyy");
                res.render('user/userPanel', {userProfile: userProfile, ownsProfile: ownsProfile});
            } else {
                res.redirect('/')
            }
        })
    },

    editGet: (req, res) => {
        let user = req.user;

        if (!user) {
            res.redirect('/');
            return;
        }

        let id = req.user.id;
        let profileNickname = req.params.nickname;

        if (user.nickname === profileNickname) {
            User.findById(id).then(user => {
                if (user) {
                    user.birthdateString = dateFormat(user.birthdate, "yyyy-mm-dd h:MM:ss");
                    res.render('user/edit', {user: user});
                }
            })

        } else {
            res.redirect('/');
        }
    },

    editPost: (req, res) => {
        let editArgs = req.body;
        let user = req.user;

        if (!user) {
            res.redirect('/');
            return;
        }

        let id = user.id;
        let profileNickname = req.params.nickname;
        let file = req.file;
        let dimensions = null;
        if (file) {
            dimensions = size(file.path)
        }
        let errorMsg = '';

        if (user.nickname === profileNickname) {
            User.findById(id).then(user => {
                if (!editArgs.fullName) {
                    errorMsg = 'Name cannot be null!';
                    fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
                } else if (editArgs.password !== editArgs.confirmedPassword) {
                    errorMsg = 'Passwords do not match!';
                    fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
                } else if (dimensions && (dimensions.width < 60 && dimensions.height < 40)) {
                    errorMsg = 'Image too small!';
                    fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
                } else if (dimensions && (dimensions.width > 5000 && dimensions.height > 5000)) {
                    errorMsg = 'Image too big!';
                    fs.unlink(__dirname + '\\..\\public\\uploads\\' + file.filename);
                }

                if (errorMsg) {
                    user.birthdateString = dateFormat(user.birthdate, "yyyy-mm-dd h:MM:ss");
                    res.render('user/edit', {error: errorMsg, user: user});
                    return;
                }

                if (file) {
                    if (user.avatar !== 'default.png') {
                        fs.unlink(__dirname + '\\..\\public\\uploads\\' + user.avatar);
                    }
                    user.avatar = file.filename;
                }
                user.aboutme = req.body.aboutme;
                user.fullName = req.body.fullName;
                user.birthdate = req.body.birthdate;
                user.location = req.body.location;

                let passwordHash = user.passwordHash;
                if (editArgs.password) {
                    passwordHash = encryption.hashPassword(editArgs.password, user.salt);
                }

                user.passwordHash = passwordHash;

                user.save((err) => {
                    if (err) {
                        res.redirect('/');
                    } else {
                        res.redirect('/user/details/' + user.nickname);
                    }
                })
            })

        } else {
            res.redirect('/');
        }
    },

    uploads: (req, res) => {
        let nickname = req.params.nickname;

        let currentPage = req.query.page;

        let currentPageInt = 0;
        if (currentPage) {
            currentPageInt = parseInt(currentPage);
        }

        let currentUrl = req.originalUrl.split("?")[0];

        let currentSort = req.query.sort;
        if (!currentSort) {
            currentSort = 'undefined'
        }

        let currentResolution = req.query.res;
        if (!currentResolution) {
            currentResolution = 'all';
        }
        let currentWidth = 0;
        let currentHeight = 0;
        if (currentResolution !== 'all') {
            currentWidth = parseInt(currentResolution.split("x")[0]);
            currentHeight = parseInt(currentResolution.split("x")[1]);
        }
        let onAllResolutions = false;
        if (currentResolution === 'all') {
            onAllResolutions = true;
        }

        User.findOne({nickname: nickname}).then(user => {
            if (!user) {
                res.redirect("/")
            } else {
                let userArticles = user.articles;
                let articlesToSearch = [];

                Article.find({}).then(articles => {
                    for (let article of articles) {
                        if (userArticles.indexOf(article.id) !== -1) {
                            articlesToSearch.push(article);
                        }
                    }

                    if (currentResolution !== 'all') {
                        articlesToSearch = articlesToSearch.filter(function (article) {
                            return article.width === currentWidth &&
                                article.height === currentHeight;
                        })
                    }

                    let pages = getPages(currentPageInt, articlesToSearch);

                    articlesToSearch = sortByParameter(currentSort, articlesToSearch);

                    articlesToSearch = articlesToSearch
                        .slice(currentPageInt * 15, currentPageInt * 15 + 15);

                    let user = req.user;

                    if (user) {
                        articlesToSearch = highlight(user, articlesToSearch);
                    }

                    res.render('home/articles', {
                        articles: articlesToSearch,
                        message: nickname + '\'s uploads',
                        pages: pages,
                        pagesExist: true,
                        sortingExists: true,
                        symbol: '?',
                        onPageWithWallpapers: true,
                        onAllResolutions: onAllResolutions,

                        currentPage: currentPage,
                        currentSort: currentSort,
                        currentResolution: currentResolution,
                        currentUrl: currentUrl
                    })
                })
            }
        })
    },

    displaySaved: (req, res) => {
        let nickname = req.params.nickname;

        if (!req.user) {
            res.redirect('/');
            return;
        }

        let currentPage = req.query.page;

        let currentPageInt = 0;
        if (currentPage) {
            currentPageInt = parseInt(currentPage);
        }

        let currentUrl = req.originalUrl.split("?")[0];

        let currentSort = req.query.sort;
        if (!currentSort) {
            currentSort = 'undefined'
        }

        let currentResolution = req.query.res;
        if (!currentResolution) {
            currentResolution = 'all';
        }
        let currentWidth = 0;
        let currentHeight = 0;
        if (currentResolution !== 'all') {
            currentWidth = parseInt(currentResolution.split("x")[0]);
            currentHeight = parseInt(currentResolution.split("x")[1]);
        }
        let onAllResolutions = false;
        if (currentResolution === 'all') {
            onAllResolutions = true;
        }

        User.findOne({nickname: nickname}).then(user => {
            if (!user) {
                res.redirect('/');
                return;
            } else if (req.user.nickname !== nickname) {
                res.redirect('/');
            } else {
                let userSavedArticles = user.savedArticles;
                let articlesToSearch = [];

                Article.find({}).then(articles => {
                    for (let article of articles) {
                        if (userSavedArticles.indexOf(article.id) !== -1) {
                            articlesToSearch.push(article);
                        }
                    }

                    if (currentResolution !== 'all') {
                        articlesToSearch = articlesToSearch.filter(function (article) {
                            return article.width === currentWidth &&
                                article.height === currentHeight;
                        })
                    }

                    let pages = getPages(currentPageInt, articlesToSearch);

                    articlesToSearch = sortByParameter(currentSort, articlesToSearch);

                    articlesToSearch = articlesToSearch
                        .slice(currentPageInt * 15, currentPageInt * 15 + 15);

                    let user = req.user;

                    if (user) {
                        articlesToSearch = highlight(user, articlesToSearch);
                    }

                    res.render('home/articles', {
                        articles: articlesToSearch,
                        message: nickname + '\'s saved',
                        pages: pages,
                        pagesExist: true,
                        sortingExists: true,
                        symbol: '?',
                        onPageWithWallpapers: true,
                        onAllResolutions: onAllResolutions,

                        currentPage: currentPage,
                        currentSort: currentSort,
                        currentResolution: currentResolution,
                        currentUrl: currentUrl
                    })
                })
            }
        })
    },

    displayUpvoted: (req, res) => {
        let nickname = req.params.nickname;

        if (!req.user) {
            res.redirect('/');
            return;
        }

        let currentPage = req.query.page;

        let currentPageInt = 0;
        if (currentPage) {
            currentPageInt = parseInt(currentPage);
        }

        let currentUrl = req.originalUrl.split("?")[0];

        let currentSort = req.query.sort;
        if (!currentSort) {
            currentSort = 'undefined'
        }

        let currentResolution = req.query.res;
        if (!currentResolution) {
            currentResolution = 'all';
        }
        let currentWidth = 0;
        let currentHeight = 0;
        if (currentResolution !== 'all') {
            currentWidth = parseInt(currentResolution.split("x")[0]);
            currentHeight = parseInt(currentResolution.split("x")[1]);
        }
        let onAllResolutions = false;
        if (currentResolution === 'all') {
            onAllResolutions = true;
        }

        User.findOne({nickname: nickname}).then(user => {
            if (!user) {
                res.redirect('/');
                return;
            } else if (req.user.nickname !== nickname) {
                res.redirect('/');
            } else {
                let userUpvotedArticles = user.upvotedArticles;
                let articlesToSearch = [];

                Article.find({}).then(articles => {
                    for (let article of articles) {
                        if (userUpvotedArticles.indexOf(article.id) !== -1) {
                            articlesToSearch.push(article);
                        }
                    }

                    if (currentResolution !== 'all') {
                        articlesToSearch = articlesToSearch.filter(function (article) {
                            return article.width === currentWidth &&
                                article.height === currentHeight;
                        })
                    }

                    let pages = getPages(currentPageInt, articlesToSearch);

                    articlesToSearch = sortByParameter(currentSort, articlesToSearch);

                    articlesToSearch = articlesToSearch
                        .slice(currentPageInt * 15, currentPageInt * 15 + 15);

                    let user = req.user;

                    if (user) {
                        articlesToSearch = highlight(user, articlesToSearch);
                    }

                    res.render('home/articles', {
                        articles: articlesToSearch,
                        message: nickname + '\'s upvoted',
                        pages: pages,
                        pagesExist: true,
                        sortingExists: true,
                        symbol: '?',
                        onPageWithWallpapers: true,
                        onAllResolutions: onAllResolutions,

                        currentPage: currentPage,
                        currentSort: currentSort,
                        currentResolution: currentResolution,
                        currentUrl: currentUrl
                    })
                })
            }
        })
    },

    displayDownvoted: (req, res) => {
        let nickname = req.params.nickname;

        if (!req.user) {
            res.redirect('/');
            return;
        }

        let currentPage = req.query.page;

        let currentPageInt = 0;
        if (currentPage) {
            currentPageInt = parseInt(currentPage);
        }

        let currentUrl = req.originalUrl.split("?")[0];

        let currentSort = req.query.sort;
        if (!currentSort) {
            currentSort = 'undefined'
        }

        let currentResolution = req.query.res;
        if (!currentResolution) {
            currentResolution = 'all';
        }
        let currentWidth = 0;
        let currentHeight = 0;
        if (currentResolution !== 'all') {
            currentWidth = parseInt(currentResolution.split("x")[0]);
            currentHeight = parseInt(currentResolution.split("x")[1]);
        }
        let onAllResolutions = false;
        if (currentResolution === 'all') {
            onAllResolutions = true;
        }

        User.findOne({nickname: nickname}).then(user => {
            if (!user) {
                res.redirect('/');
                return;
            } else if (req.user.nickname !== nickname) {
                res.redirect('/');
            } else {
                let userDownvotedArticles = user.downvotedArticles;
                let articlesToSearch = [];

                Article.find({}).then(articles => {
                    for (let article of articles) {
                        if (userDownvotedArticles.indexOf(article.id) !== -1) {
                            articlesToSearch.push(article);
                        }
                    }

                    if (currentResolution !== 'all') {
                        articlesToSearch = articlesToSearch.filter(function (article) {
                            return article.width === currentWidth &&
                                article.height === currentHeight;
                        })
                    }

                    let pages = getPages(currentPageInt, articlesToSearch);

                    articlesToSearch = sortByParameter(currentSort, articlesToSearch);

                    articlesToSearch = articlesToSearch
                        .slice(currentPageInt * 15, currentPageInt * 15 + 15);

                    let user = req.user;

                    if (user) {
                        articlesToSearch = highlight(user, articlesToSearch);
                    }

                    res.render('home/articles', {
                        articles: articlesToSearch,
                        message: nickname + '\'s downvoted',
                        pages: pages,
                        pagesExist: true,
                        sortingExists: true,
                        symbol: '?',
                        onPageWithWallpapers: true,
                        onAllResolutions: onAllResolutions,

                        currentPage: currentPage,
                        currentSort: currentSort,
                        currentResolution: currentResolution,
                        currentUrl: currentUrl
                    })
                })
            }
        })
    }
};

function sortByParameter(currentSort, articlesToSearch) {
    if (currentSort === 'views') {
        return articlesToSearch = articlesToSearch
            .sort(function (a, b) {
                if (a.views > b.views) return -1;
                if (a.views < b.views) return 1;
            })
    } else if (currentSort === 'downloads') {
        return articlesToSearch = articlesToSearch
            .sort(function (a, b) {
                if (a.downloads > b.downloads) return -1;
                if (a.downloads < b.downloads) return 1;
            })
    } else if (currentSort === 'rating') {
        return articlesToSearch = articlesToSearch
            .sort(function (a, b) {
                if (a.rating > b.rating) return -1;
                if (a.rating < b.rating) return 1;
            })
    } else {
        return articlesToSearch = articlesToSearch.reverse();
    }
}

function highlight(user, articlesToSearch) {
    User.findById(user.id).then(currentUser => {
        if (currentUser) {
            for (let article of articlesToSearch) {
                if (currentUser.upvotedArticles.indexOf(article.id) !== -1) {
                    article.isUpvoted = true;
                } else if (currentUser.downvotedArticles.indexOf(article.id) !== -1) {
                    article.isDownvoted = true;
                }
            }
        }
    });
    return articlesToSearch;
}

function getPages(currentPageInt, articlesToSearch) {
    let articlesCount = articlesToSearch.length;
    let numberOfPages = Math.ceil(articlesCount / 15);

    var pages = [];

    for (var a = 1; a <= numberOfPages; a++) {
        if (currentPageInt + 1 === a) {
            var page = {text: a, index: a - 1, isSelected: true};
        } else {
            var page = {text: a, index: a - 1, isSelected: false};
        }
        pages.push(page);
    }
    return pages;
}