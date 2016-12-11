const mongoose = require('mongoose');

let commentSchema = mongoose.Schema({
    content: {type: String, required: true},
    date: {type: Date, default: Date.now()},
    article: {type: mongoose.Schema.Types.ObjectId, ref: 'Article', required: true},
    user: {type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true},
    upvotes: [{type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true}],
    downvotes: [{type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true}]
});

commentSchema.method({
    prepareDelete: function () {
        let User = mongoose.model('User');
        let Article = mongoose.model('Article');

        User.find({}).then(allUsers => {
            for (let currentUser of allUsers) {
                if (currentUser.upvotedComments.indexOf(this.id) !== -1) {
                    currentUser.upvotedComments.remove(this.id);
                } else if (currentUser.downvotedComments.indexOf(this.id) !== -1) {
                    currentUser.downvotedComments.remove(this.id);
                }

                if (currentUser.comments.indexOf(this.id) !== -1) {
                    currentUser.comments.remove(this.id);
                }

                currentUser.save();
            }
        });

        Article.find({}).then(allArticles => {
            for (let currentArticle of allArticles) {
                if (currentArticle.comments.indexOf(this.id) !== -1) {
                    currentArticle.comments.remove(this.id);
                    currentArticle.save();
                }
            }
        });
    }
});

commentSchema.set('versionKey', false);
const Comment = mongoose.model('Comment', commentSchema);