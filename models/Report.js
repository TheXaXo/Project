const mongoose = require('mongoose');

let reportSchema = mongoose.Schema({
    reason: {type: String, required: true},
    article: {type: mongoose.Schema.Types.ObjectId, ref: 'Article', required: true},
    reportedBy: {type: String, required: true}
});

reportSchema.set('versionKey', false);
const Report = mongoose.model('Report', reportSchema);