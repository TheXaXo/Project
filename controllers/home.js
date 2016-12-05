const mongoose = require('mongoose');
const Article = mongoose.model('Article');
const User = mongoose.model('User');
const Category = mongoose.model('Category');

module.exports = {
    listCategoryArticles: (req, res) => {
        let id = req.params.id;

        // Yes, it's a valid ObjectId, proceed with `findById` call.
        if (!id.match(/^[0-9a-fA-F]{24}$/)) {
            res.redirect('/');
            return
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
            currentResolution = 'all'
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

        Category.findById(id).populate('articles').then(category => {
            User.populate(category.articles, {path: 'author'}, (err) => {
                if (err) {
                    console.log(err.message);
                }

                let categoryArticles = category.articles;

                if (currentResolution !== 'all') {
                    categoryArticles = categoryArticles.filter(function (article) {
                        return article.width === currentWidth &&
                            article.height === currentHeight;
                    })
                }

                var pages = [];
                let articlesCount = categoryArticles.length;
                let numberOfPages = Math.ceil(articlesCount / 15);

                for (var a = 1; a <= numberOfPages; a++) {
                    if (currentPageInt + 1 === a) {
                        var page = {text: a, index: a - 1, isSelected: true};
                    } else {
                        var page = {text: a, index: a - 1, isSelected: false};
                    }
                    pages.push(page);
                }

                if (currentSort === 'views') {
                    categoryArticles = categoryArticles
                        .sort(function (a, b) {
                            if (a.views > b.views) return -1;
                            if (a.views < b.views) return 1;
                        })
                } else if (currentSort === 'downloads') {
                    categoryArticles = categoryArticles
                        .sort(function (a, b) {
                            if (a.downloads > b.downloads) return -1;
                            if (a.downloads < b.downloads) return 1;
                        })
                } else {
                    categoryArticles = categoryArticles.reverse();
                }

                categoryArticles = categoryArticles
                    .slice(currentPageInt * 15, currentPageInt * 15 + 15);


                res.render('home/articles', {
                    articles: categoryArticles,
                    pages: pages,
                    pagesExist: true,
                    sortingExists: true,
                    symbol: '?',
                    onPageWithWallpapers: true,
                    onAllResolutions: onAllResolutions,

                    currentUrl: currentUrl,
                    currentSort: currentSort,
                    currentPage: currentPage,
                    currentResolution: currentResolution
                })
            });
        });
    },

    index: (req, res) => {
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

        var pages = [];
        Article.find({}).then(articles => {
            if (currentResolution !== 'all') {
                articles = articles.filter(function (article) {
                    return article.width === currentWidth &&
                        article.height === currentHeight;
                })
            }

            let articlesCount = articles.length;
            let numberOfPages = Math.ceil(articlesCount / 15);

            for (var a = 1; a <= numberOfPages; a++) {
                if (currentPageInt + 1 === a) {
                    var page = {text: a, index: a - 1, isSelected: true};
                } else {
                    var page = {text: a, index: a - 1, isSelected: false};
                }
                pages.push(page);
            }

            if (currentSort === 'views') {
                articles = articles
                    .sort(function (a, b) {
                        if (a.views > b.views) return -1;
                        if (a.views < b.views) return 1;
                    })
            } else if (currentSort === 'downloads') {
                articles = articles
                    .sort(function (a, b) {
                        if (a.downloads > b.downloads) return -1;
                        if (a.downloads < b.downloads) return 1;
                    })
            } else {
                articles = articles.reverse();
            }

            articles = articles
                .slice(currentPageInt * 15, currentPageInt * 15 + 15);


            res.render('home/articles', {
                articles: articles,
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
            });
        });
    },

    search: (req, res) => {
        let tagsAsText = req.query.q;
        let tagsToSearch = tagsAsText.split(" ");

        let articlesToSearch = [];

        let currentPage = req.query.page;

        let currentPageInt = 0;
        if (currentPage) {
            currentPageInt = parseInt(currentPage);
        }

        let currentUrl = req.originalUrl.split("&")[0];

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

        Article.find({}).populate('author').then(articles => {
            for (let article of articles) {
                for (let tagToSearch of tagsToSearch) {
                    if (article.tags.indexOf(tagToSearch) !== -1) {
                        articlesToSearch.push(article);
                        break;
                    }
                }
            }

            if (currentResolution !== 'all') {
                articles = articles.filter(function (article) {
                    return article.width === currentWidth &&
                        article.height === currentHeight;
                })
            }

            var pages = [];
            let articlesCount = articlesToSearch.length;
            let numberOfPages = Math.ceil(articlesCount / 15);

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
                .slice(currentPageInt * 15, currentPageInt * 15 + 15);

            res.render('home/articles', {
                articles: articlesToSearch,
                pages: pages,
                pagesExist: true,
                sortingExists: true,
                symbol: '&',
                message: 'Search wallpapers: ' + tagsAsText,
                onPageWithWallpapers: true,
                onAllResolutions: onAllResolutions,

                currentPage: currentPage,
                currentSort: currentSort,
                currentResolution: currentResolution,
                currentUrl: currentUrl
            });
        });
    }
};