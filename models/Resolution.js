const mongoose = require('mongoose');

let resolutionSchema = mongoose.Schema({
    name: {type: String, required: true, unique: true},
    width: {type: Number, required: true, unique: true},
    height: {type: Number, required: true, unique: true}
});

resolutionSchema.set('versionKey', false);
const Resolution = mongoose.model('Resolution', resolutionSchema);

module.exports = Resolution;