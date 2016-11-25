const userController = require('./user');
const categoryController = require('./category');
const resolutionController = require('./resolution');

module.exports = {
    user: userController,
    category: categoryController,
    resolution: resolutionController
};