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
            currentPage = pageFromQuery;
        }

        Category.findById(id).populate('articles').then(category => {
            User.populate(category.articles, {path: 'author'}, (err) => {
                if (err) {
                    console.log(err.message);
                }

                let categoryArticles = category.articles;

                var pages = new Object();
                let articlesCount = categoryArticles.length;
                let numberOfPages = Math.ceil(articlesCount / 3);

                for (var a = 1; a <= numberOfPages; a++) {
                    pages[a] = a - 1;
                }

                categoryArticles = categoryArticles.slice(currentPage * 3, currentPage * 3 + 3);
                let currentUrl = req.originalUrl.split("?")[0];

                res.render('home/articles', {articles: categoryArticles, pages: pages, pagesExist: true, currentUrl, currentUrl})
            });
        });
    },

    index: (req, res) => {
        let pageFromQuery = req.query.page;

        let page = 0;

        if (pageFromQuery) {
            page = pageFromQuery
        }

        var pages = new Object();
        Article.find({}).then(articles => {
            let articlesCount = articles.length;
            let numberOfPages = Math.ceil(articlesCount / 3);

            for (var a = 1; a <= numberOfPages; a++) {
                pages[a] = a - 1;
            }
        });

        Article.find({}).skip(page * 3).limit(3).then(articles => {
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
            currentPage = pageFromQuery;
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

            var pages = new Object();
            let articlesCount = articlesToSearch.length;
            let numberOfPages = Math.ceil(articlesCount / 3);

            for (var a = 1; a <= numberOfPages; a++) {
                pages[a] = a - 1;
            }

            let currentUrl = req.originalUrl.split("&")[0];

            articlesToSearch = articlesToSearch.slice(currentPage * 3, currentPage * 3 + 3);
            res.render('home/articles', {articles: articlesToSearch, pages: pages,
                pagesExist: true, appendWithAnd: true, currentUrl: currentUrl, error: 'Search wallpapers: ' + tagsAsText});
        });
    }
};