const mongoose = require('mongoose');
var fs = require("fs");

let categorySchema = mongoose.Schema({
    name: {type: String, required: true, unique: true},
    articles: [{type: mongoose.Schema.Types.ObjectId, ref: 'Article'}]
});

categorySchema.method({
    prepareDelete: function () {
        let Article = mongoose.model('Article');
        for (let article of this.articles) {
            Article.findById(article).then(article => {
                article.prepareDelete();
                fs.unlink(__dirname + '\\..\\public\\uploads\\' + article.imgName);
                article.remove();
            })
        }
    }
});

categorySchema.set('versionKey', false);
const Category = mongoose.model('Category', categorySchema);