const Report = require('mongoose').model('Report');

module.exports = {
    all: (req, res) => {
        Report.find({}).then(reports => {
            res.render('admin/report/all', {reports: reports})
        })
    },

    viewReason: (req, res) => {
        let id = req.params.id;

        Report.findById(id).then(report => {
            if (!report) {
                res.redirect('/admin/report/all')
            }

            res.render('admin/report/viewReason', {report: report})
        })
    },

    resolveReport: (req, res) => {
        let id = req.params.id;

        Report.findById(id).then(report => {
            if (!report) {
                res.redirect('/admin/report/all')
            }

            report.remove();
            res.redirect('/admin/report/all')
        })
    }
};