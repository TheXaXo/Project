const Article = require('mongoose').model('Article');
const User = require('mongoose').model('User');

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
                message: 'Search by tag: ' + tag,
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