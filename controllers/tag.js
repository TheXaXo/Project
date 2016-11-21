const mongoose = require('mongoose');
const Article = require('mongoose').model('Article');

module.exports = {
    listArticlesByTag: (req, res) => {
        let tag = req.params.name;
        let articlesToSearch = [];

        Article.find({}).populate('author').then(articles => {
            for (let article of articles) {
                if (article.tags.indexOf(tag) !== -1) {
                    articlesToSearch.push(article);
                }
            }
        });

        res.render('home/articles', {articles: articlesToSearch, error: 'Search by tag: ' + tag});
    }
};