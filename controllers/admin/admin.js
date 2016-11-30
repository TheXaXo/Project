const userController = require('./user');
const categoryController = require('./category');
const resolutionController = require('./resolution');
const reportController = require('./report');

module.exports = {
    user: userController,
    category: categoryController,
    resolution: resolutionController,
    report: reportController
};