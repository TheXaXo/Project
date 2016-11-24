const mongoose = require('mongoose');
const Article = mongoose.model('Article');
const User = mongoose.model('User');
const Category = mongoose.model('Category');

module.exports = {
    listCategoryArticles: (req, res) => {
        let id = req.params.id;

        let pageFromQuery = req.query.page;
        let currentPage = 0;

        if (pageFromQuery) {
            currentPage = parseInt(pageFromQuery);
        }

        Category.findById(id).populate('articles').then(category => {
            User.populate(category.articles, {path: 'author'}, (err) => {
                if (err) {
                    console.log(err.message);
                }

                let categoryArticles = category.articles;

                var pages = [];
                let articlesCount = categoryArticles.length;
                let numberOfPages = Math.ceil(articlesCount / 3);

                for (var a = 1; a <= numberOfPages; a++) {
                    if (currentPage + 1 === a) {
                        var page = {text: a, index: a - 1, isSelected: true};
                    } else {
                        var page = {text: a, index: a - 1, isSelected: false};
                    }
                    pages.push(page);
                }

                let sortingOptions = req.query.sort;

                if (sortingOptions === 'views') {
                    categoryArticles = categoryArticles
                        .sort(function (a, b) {
                            if (a.views > b.views) return -1;
                            if (a.views < b.views) return 1;
                        })
                } else if (sortingOptions === 'downloads') {
                    categoryArticles = categoryArticles
                        .sort(function (a, b) {
                            if (a.downloads > b.downloads) return -1;
                            if (a.downloads < b.downloads) return 1;
                        })
                } else {
                    categoryArticles = categoryArticles.reverse();
                }

                categoryArticles = categoryArticles
                    .slice(currentPage * 3, currentPage * 3 + 3);

                let currentUrl = req.originalUrl.split("?")[0];
                let currentUrlWithSortQuery = req.originalUrl.split("?")[0] + '?sort=' + sortingOptions;


                res.render('home/articles', {
                    articles: categoryArticles,
                    pages: pages,
                    pagesExist: true,
                    sortingExists: true,
                    currentUrl: currentUrl,
                    symbol: '?',
                    currentUrlWithSortQuery: currentUrlWithSortQuery
                })
            });
        });
    },

    index: (req, res) => {
        let pageFromQuery = req.query.page;

        let currentPage = 0;

        if (pageFromQuery) {
            currentPage = parseInt(pageFromQuery)
        }

        var pages = [];
        Article.find({}).then(articles => {
            let articlesCount = articles.length;
            let numberOfPages = Math.ceil(articlesCount / 3);

            for (var a = 1; a <= numberOfPages; a++) {
                if (currentPage + 1 === a) {
                    var page = {text: a, index: a - 1, isSelected: true};
                } else {
                    var page = {text: a, index: a - 1, isSelected: false};
                }
                pages.push(page);
            }

            let sortingOptions = req.query.sort;

            if (sortingOptions === 'views') {
                articles = articles
                    .sort(function (a, b) {
                        if (a.views > b.views) return -1;
                        if (a.views < b.views) return 1;
                    })
            } else if (sortingOptions === 'downloads') {
                articles = articles
                    .sort(function (a, b) {
                        if (a.downloads > b.downloads) return -1;
                        if (a.downloads < b.downloads) return 1;
                    })
            } else {
                articles = articles.reverse();
            }

            articles = articles
                .slice(currentPage * 3, currentPage * 3 + 3);

            let currentUrl = req.originalUrl.split("?")[0];
            let currentUrlWithSortQuery = req.originalUrl.split("?")[0] + '?sort=' + sortingOptions;

            res.render('home/articles', {
                articles: articles,
                pages: pages,
                pagesExist: true,
                sortingExists: true,
                symbol: '?',
                currentUrl: currentUrl,
                currentUrlWithSortQuery: currentUrlWithSortQuery});
        });
    },

    search: (req, res) => {
        let tagsAsText = req.query.q;
        let tagsToSearch = tagsAsText.split(" ");

        let articlesToSearch = [];

        let pageFromQuery = req.query.page;
        let currentPage = 0;

        if (pageFromQuery) {
            currentPage = parseInt(pageFromQuery);
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

            var pages = [];
            let articlesCount = articlesToSearch.length;
            let numberOfPages = Math.ceil(articlesCount / 3);

            for (var a = 1; a <= numberOfPages; a++) {
                if (currentPage + 1 === a) {
                    var page = {text: a, index: a - 1, isSelected: true};
                } else {
                    var page = {text: a, index: a - 1, isSelected: false};
                }
                pages.push(page);
            }

            let sortingOptions = req.query.sort;

            if (sortingOptions === 'views') {
                articlesToSearch = articlesToSearch
                    .sort(function (a, b) {
                        if (a.views > b.views) return -1;
                        if (a.views < b.views) return 1;
                    })
            } else if (sortingOptions === 'downloads') {
                articlesToSearch = articlesToSearch
                    .sort(function (a, b) {
                        if (a.downloads > b.downloads) return -1;
                        if (a.downloads < b.downloads) return 1;
                    })
            } else {
                articlesToSearch = articlesToSearch.reverse();
            }

            articlesToSearch = articlesToSearch
                .slice(currentPage * 3, currentPage * 3 + 3);

            let currentUrl = req.originalUrl.split("&")[0];
            let currentUrlWithSortQuery = req.originalUrl.split("&")[0] + '&sort=' + sortingOptions;

            res.render('home/articles', {
                articles: articlesToSearch,
                pages: pages,
                pagesExist: true,
                sortingExists: true,
                currentUrlWithSortQuery: currentUrlWithSortQuery,
                symbol: '&',
                currentUrl: currentUrl,
                error: 'Search wallpapers: ' + tagsAsText
            });
        });
    }
};