const mongoose = require('mongoose');
const Article = mongoose.model('Article');
const User = mongoose.model('User');
const Category = mongoose.model('Category');

module.exports = {
    listCategoryArticles: (req, res) => {
        let id = req.params.id;

        Category.findById(id).populate('articles').then(category => {
            User.populate(category.articles, {path: 'author'}, (err) => {
                if (err) {
                    console.log(err.message);
                }
                res.render('home/articles', {articles: category.articles})
            });
        });
    },

    index: (req, res) => {
        Article.find({}).limit(18).populate('author').then(articles => {
            res.render('home/index', {articles: articles});
        })
    },

    search: (req, res) => {
        let tagsAsText = req.body.tags;
        let tagsToSearch = tagsAsText.split(" ");

        let articlesToSearch = [];

        Article.find({}).populate('author').then(articles => {
            for (let article of articles) {
                for (let tagToSearch of tagsToSearch) {
                    if (article.tags.indexOf(tagToSearch) !== -1) {
                        articlesToSearch.push(article);
                        break;
                    }
                }
            }
        });

        res.render('home/articles', {articles: articlesToSearch, error: 'Search wallpapers: ' + tagsAsText});
    }
};