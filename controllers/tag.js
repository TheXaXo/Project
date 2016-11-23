const mongoose = require('mongoose');
const Article = require('mongoose').model('Article');

module.exports = {
    listArticlesByTag: (req, res) => {
        let tag = req.params.name;
        let articlesToSearch = [];

        let pageFromQuery = req.query.page;
        let currentPage = 0;

        if (pageFromQuery) {
            currentPage = pageFromQuery;
        }

        Article.find({}).populate('author').then(articles => {
            for (let article of articles) {
                if (article.tags.indexOf(tag) !== -1) {
                    articlesToSearch.push(article);
                }
            }

            var pages = new Object();
            let articlesCount = articlesToSearch.length;
            let numberOfPages = Math.ceil(articlesCount / 3);

            for (var a = 1; a <= numberOfPages; a++) {
                pages[a] = a - 1;
            }

            articlesToSearch = articlesToSearch.slice(currentPage * 3, currentPage * 3 + 3);
            let currentUrl = req.originalUrl.split("?")[0];

            res.render('home/articles', {articles: articlesToSearch, error: 'Search by tag: ' + tag,
            pages: pages, pagesExist: true, currentUrl: currentUrl});
        });
    }
};