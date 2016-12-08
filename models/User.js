const mongoose = require('mongoose');
const Role = require('mongoose').model('Role');
const encryption = require('./../utilities/encryption');
var fs = require("fs");

let userSchema = mongoose.Schema(
    {
        email: {type: String, required: true, unique: true},
        passwordHash: {type: String, required: true},
        fullName: {type: String, required: true},
        nickname: {type: String, required: true},
        location: {type: String, required: false},
        aboutme: {type: String, required: false, default: 'No information'},
        avatar: {type: String},
        birthdate: {type: Date, required: true},
        articles: [{type: mongoose.Schema.Types.ObjectId, ref: 'Article'}],
        savedArticles: [{type: mongoose.Schema.Types.ObjectId, ref: 'Article'}],
        upvotedArticles: [{type: mongoose.Schema.Types.ObjectId, ref: 'Article'}],
        downvotedArticles: [{type: mongoose.Schema.Types.ObjectId, ref: 'Article'}],
        roles: [{type: mongoose.Schema.Types.ObjectId, ref: 'Role'}],
        salt: {type: String, required: true}
    }
);

userSchema.method({
    authenticate: function (password) {
        let inputPasswordHash = encryption.hashPassword(password, this.salt);
        let isSamePasswordHash = inputPasswordHash === this.passwordHash;

        return isSamePasswordHash;
    },

    isAuthor: function (article) {
        if (!article) {
            return false;
        }

        let isAuthor = article.author.equals(this.id);

        return isAuthor;
    },

    isInRole: function (roleName) {
        return Role.findOne({name: roleName}).then(role => {
            if (!role) {
                return false;
            }

            let isInRole = this.roles.indexOf(role.id) !== -1;
            return isInRole;
        })
    },

    prepareDelete: function () {
        for (let role of this.roles) {
            Role.findById(role).then(role => {
                role.users.remove(this.id);
                role.save();
            })
        }
        let Article = mongoose.model('Article');

        // Scans the upvoted articles and fixes rating accordingly.
        for (let article of this.upvotedArticles){
            Article.findById(article).then(article =>{
                article.rating -= 1;
                article.save();
            })
        }

        // Scans the downvoted articles and fixes rating accordingly.
        for (let article of this.downvotedArticles){
            Article.findById(article).then(article =>{
                article.rating += 1;
                article.save();
            })
        }

        // Scans articles uploaded by the user and deletes them.
        for (let article of this.articles) {
            Article.findById(article).then(article => {
                fs.unlink(__dirname + '\\..\\public\\uploads\\' + article.imgName);
                article.prepareDelete();
                article.remove();
            })
        }
    }
});

userSchema.set('versionKey', false);

const User = mongoose.model('User', userSchema);

module.exports = User;