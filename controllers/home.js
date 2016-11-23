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

                categoryArticles = categoryArticles.slice(currentPage * 3, currentPage * 3 + 3);
                let currentUrl = req.originalUrl.split("?")[0];

                res.render('home/articles', {
                    articles: categoryArticles,
                    pages: pages,
                    pagesExist: true,
                    currentUrl: currentUrl
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
        });

        Article.find({}).skip(currentPage * 3).limit(3).then(articles => {
            res.render('home/articles', {articles: articles, pages: pages, pagesExist: true});
        })
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

            let currentUrl = req.originalUrl.split("&")[0];

            articlesToSearch = articlesToSearch.slice(currentPage * 3, currentPage * 3 + 3);
            res.render('home/articles', {
                articles: articlesToSearch, pages: pages,
                pagesExist: true, appendWithAnd: true, currentUrl: currentUrl, error: 'Search wallpapers: ' + tagsAsText
            });
        });
    }
};