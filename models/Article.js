const mongoose = require('mongoose');

let articleSchema = mongoose.Schema({
    author: {type: mongoose.Schema.Types.ObjectId, required: true, ref: 'User'},
    category: {type: mongoose.Schema.Types.ObjectId, required: true, ref: 'Category'},
    comments: [{type: mongoose.Schema.Types.ObjectId, required: true, ref: 'Comment'}],
    imgName: {type: String, required: true},
    width: {type: Number, required: true},
    height: {type: Number, required: true},
    tags: [{type: String, required: true}],
    date: {type: Date, default: Date.now()},
    views: {type: Number, default: 0},
    downloads: {type: Number, default: 0},
    rating: {type: Number, default: 0}
});

articleSchema.method({
    prepareInsert: function () {
        let User = mongoose.model('User');
        User.findById(this.author).then(user => {
            user.articles.push(this.id);
            user.save();
        });

        let Category = mongoose.model('Category');
        Category.findById(this.category).then(category => {
            if (category) {
                category.articles.push(this.id);
                category.save();
            }
        });
    },

    prepareDelete: function () {
        let User = mongoose.model('User');
        User.findById(this.author).then(user => {
            if (user) {
                user.articles.remove(this.id);
                user.save();
            }
        });

        User.find({}).then(users => {
            for (let user of users) {
                if (user.savedArticles.indexOf(this.id) !== -1) {
                    user.savedArticles.remove(this.id);
                }

                if (user.upvotedArticles.indexOf(this.id) !== -1) {
                    user.upvotedArticles.remove(this.id);
                } else if (user.downvotedArticles.indexOf(this.id) !== -1) {
                    user.downvotedArticles.remove(this.id);
                }
                user.save();
            }
        });

        let Category = mongoose.model('Category');
        Category.findById(this.category).then(category => {
            if (category) {
                category.articles.remove(this.id);
                category.save();
            }
        });

        let Comment = mongoose.model('Comment');
        for (let comment of this.comments) {
            Comment.findById(comment).then(currentComment => {
                currentComment.prepareDelete();
                currentComment.remove();
            })
        }
    }
});

const Article = mongoose.model('Article', articleSchema);
module.exports = Article;