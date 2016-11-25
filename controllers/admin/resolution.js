const Resolution = require('mongoose').model('Resolution');

module.exports = {
    all: (req, res) => {
        Resolution.find({}).then(resolutions => {
            res.render('admin/resolution/all', {resolutions: resolutions});
        })
    },

    createGet: (req, res) => {
        res.render('admin/resolution/create');
    },

    createPost: (req, res) => {
        let resolutionArgs = req.body;

        if (!resolutionArgs.width) {
            let errorMsg = 'Resolution width cannot be null!';
            resolutionArgs.error = errorMsg;
            res.render('admin/resolution/create', resolutionArgs);
        } else if (!resolutionArgs.height) {
            let errorMsg = 'Resolution height cannot be null!';
            resolutionArgs.error = errorMsg;
            res.render('admin/resolution/create', resolutionArgs);
        } else {
            let name = resolutionArgs.width + 'x' + resolutionArgs.height;
            resolutionArgs.name = name;
            Resolution.create(resolutionArgs).then(resolution => {
                res.redirect('/admin/resolution/all');
            })
        }
    },

    editGet: (req, res) => {
        let id = req.params.id;

        Resolution.findById(id).then(resolution => {
            res.render('admin/resolution/edit', {resolution: resolution});
        });
    },

    editPost: (req, res) => {
        let id = req.params.id;

        let editArgs = req.body;

        if (!editArgs.width) {
            let errorMsg = 'Resolution width cannot be null!';

            Resolution.findById(id).then(resolution => {
                res.render('admin/resolution/edit', {resolution: resolution, error: errorMsg});
            })
        } else if (!editArgs.height) {
            let errorMsg = 'Resolution height cannot be null!';

            Resolution.findById(id).then(resolution => {
                res.render('admin/resolution/edit', {resolution: resolution, error: errorMsg})
            })
        } else {
            let name = editArgs.width + 'x' + editArgs.height;
            editArgs.name = name;
            Resolution.findOneAndUpdate({_id: id}, {name: editArgs.name, width: editArgs.width, height: editArgs.height}).then(resolution => {
                res.redirect('/admin/resolution/all');
            })
        }
    },

    deleteGet: (req, res) => {
        let id = req.params.id;

        Resolution.findById(id).then(resolution => {
            res.render('admin/resolution/delete', {resolution: resolution});
        });
    },

    deletePost: (req, res) => {
        let id = req.params.id;

        Resolution.findOneAndRemove({_id: id}).then(resolution => {
            res.redirect('/admin/resolution/all');
        });
    }
};