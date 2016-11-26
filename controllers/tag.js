const Article = require('mongoose').model('Article');

module.exports = {
    listArticlesByTag: (req, res) => {
        let tag = req.params.name;
        let articlesToSearch = [];

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

        Article.find({}).populate('author').then(articles => {
            for (let article of articles) {
                if (article.tags.indexOf(tag) !== -1) {
                    articlesToSearch.push(article);
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
                error: 'Search by tag: ' + tag,
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
    }
};