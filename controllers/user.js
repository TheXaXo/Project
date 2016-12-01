const User = require('mongoose').model('User');
const Article = require('mongoose').model('Article');
const Role = require('mongoose').model('Role');
const encryption = require('./../utilities/encryption');
var fs = require("fs");

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
        let errorMsg = '';

        if (user.nickname === profileNickname) {
            User.findById(id).then(user => {
                if (!editArgs.fullName) {
                    errorMsg = 'Name cannot be null!';
                } else if (editArgs.password !== editArgs.confirmedPassword) {
                    errorMsg = 'Passwords do not match!';
                }

                if (errorMsg) {
                    res.render('user/edit', {error: errorMsg});
                    return;
                }

                if (req.file) {
                    if (user.avatar !== 'default.png') {
                        fs.unlink(__dirname + '\\..\\public\\uploads\\' + user.avatar);
                    }
                    user.avatar = req.file.filename;
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
                            return articlesToSearch.width === currentWidth &&
                                articlesToSearch.height === currentHeight;
                        })
                    }

                    var pages = [];
                    let articlesCount = articlesToSearch.length;
                    let numberOfPages = Math.ceil(articlesCount / 3);

                    for (var a = 1; a <= numberOfPages; a++) {
                        if (currentPageInt + 1 === a) {
                            var page = {text: a, index: a - 1, isSelected: true};
                        } else {
                            var page = {text: a, index: a - 1, isSelected: false};
                        }
                        pages.push(page);
                    }

                    if (currentSort === 'views') {
                        articlesToSearch = articlesToSearch
                            .sort(function (a, b) {
                                if (a.views > b.views) return -1;
                                if (a.views < b.views) return 1;
                            })
                    } else if (currentSort === 'downloads') {
                        articlesToSearch = articlesToSearch
                            .sort(function (a, b) {
                                if (a.downloads > b.downloads) return -1;
                                if (a.downloads < b.downloads) return 1;
                            })
                    } else {
                        articlesToSearch = articlesToSearch.reverse();
                    }

                    articlesToSearch = articlesToSearch
                        .slice(currentPageInt * 3, currentPageInt * 3 + 3);

                    res.render('home/articles', {
                        articles: articlesToSearch,
                        error: nickname + '\'s uploads',
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
                            return articlesToSearch.width === currentWidth &&
                                articlesToSearch.height === currentHeight;
                        })
                    }

                    var pages = [];
                    let articlesCount = articlesToSearch.length;
                    let numberOfPages = Math.ceil(articlesCount / 3);

                    for (var a = 1; a <= numberOfPages; a++) {
                        if (currentPageInt + 1 === a) {
                            var page = {text: a, index: a - 1, isSelected: true};
                        } else {
                            var page = {text: a, index: a - 1, isSelected: false};
                        }
                        pages.push(page);
                    }

                    if (currentSort === 'views') {
                        articlesToSearch = articlesToSearch
                            .sort(function (a, b) {
                                if (a.views > b.views) return -1;
                                if (a.views < b.views) return 1;
                            })
                    } else if (currentSort === 'downloads') {
                        articlesToSearch = articlesToSearch
                            .sort(function (a, b) {
                                if (a.downloads > b.downloads) return -1;
                                if (a.downloads < b.downloads) return 1;
                            })
                    } else {
                        articlesToSearch = articlesToSearch.reverse();
                    }

                    articlesToSearch = articlesToSearch
                        .slice(currentPageInt * 3, currentPageInt * 3 + 3);

                    res.render('home/articles', {
                        articles: articlesToSearch,
                        error: nickname + '\'s saved',
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
