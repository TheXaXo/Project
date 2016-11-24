const mongoose = require('mongoose');
const Article = require('mongoose').model('Article');

module.exports = {
    listArticlesByTag: (req, res) => {
        let tag = req.params.name;
        let articlesToSearch = [];

        let pageFromQuery = req.query.page;
        let currentPage = 0;

        if (pageFromQuery) {
            currentPage = parseInt(pageFromQuery);
        }

        Article.find({}).populate('author').then(articles => {
            for (let article of articles) {
                if (article.tags.indexOf(tag) !== -1) {
                    articlesToSearch.push(article);
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

            let currentUrl = req.originalUrl.split("?")[0];
            let currentUrlWithSortQuery = req.originalUrl.split("?")[0] + '?sort=' + sortingOptions;

            res.render('home/articles', {
                articles: articlesToSearch,
                error: 'Search by tag: ' + tag,
                pages: pages,
                pagesExist: true,
                sortingExists: true,
                symbol: '?',
                currentUrl: currentUrl,
                currentUrlWithSortQuery: currentUrlWithSortQuery});
        });
    }
};