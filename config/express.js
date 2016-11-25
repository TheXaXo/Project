const express = require('express');
const path = require('path');
const cookieParser = require('cookie-parser');
const bodyParser = require('body-parser');
const session = require('express-session');
const passport = require('passport');

module.exports = (app, config) => {
    // View engine setup.
    app.set('views', path.join(config.rootFolder, '/views'));
    app.set('view engine', 'hbs');

    var hbs = require('hbs');

    // This set up which is the parser for the request's data.
    app.use(bodyParser.json());
    app.use(bodyParser.urlencoded({extended: true}));

    // We will use cookies.
    app.use(cookieParser());

    // Session is storage for cookies, which will be de/encrypted with that 'secret' key.
    app.use(session({secret: 's3cr3t5tr1ng', resave: false, saveUninitialized: false}));

    // For user validation we will use passport module.
    app.use(passport.initialize());
    app.use(passport.session());

    app.use((req, res, next) => {
        if (req.user) {
            res.locals.user = req.user;
            req.user.isInRole('Admin').then(isAdmin => {
                res.locals.isAdmin = isAdmin;
                next();
            });
            let fullName = req.user.fullName;
            let firstName = fullName.split(" ")[0];
            app.locals.firstName = firstName;
        } else {
            next();
        }
    });

    app.use((req, res, next) => {
        let url = req.url.split("/")[1];
        const Category = require('mongoose').model('Category');

        if (url !== "category") {
            Category.find({}).then(categories => {
                {
                    for (let category of categories) {
                        category.articlesCount = category.articles.length;
                    }
                    app.locals.categories = categories;
                }
            });

        } else {
            Category.find({}).then(categories => {
                for (let category of categories) {
                    category.articlesCount = category.articles.length;
                }
                for (let categoryToCheck of categories) {
                    Category.findById(req.params.id).then(currentCategory => {
                        if (categoryToCheck.name === currentCategory.name) {
                            categoryToCheck.isChecked = true;
                        }
                    })
                }
                app.locals.categories = categories;
            });
        }
        next();
    });

    app.use((req, res, next) => {
        const Resolution = require('mongoose').model('Resolution');
        let resolutionQuery = req.query.res;

        Resolution.find({}).then(resolutions => {
            {
                for (let resolution of resolutions) {
                    if (resolution.name === resolutionQuery) {
                        resolution.isChecked = true;
                    } else {
                        resolution.isChecked = false;
                    }
                }
                app.locals.resolutions = resolutions;
            }
        });

        next();
    });

    // This makes the content in the "public" folder accessible for every user.
    app.use(express.static(path.join(config.rootFolder, 'public')));
};