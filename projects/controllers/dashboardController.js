var Project = require('../model/project');

exports.renderDashboard = (req, res) => {
    const session = req.session;
    if(session.isAuthenticated)
    {
        return res.render('dashboard/show', { user: session.user });
    }

    return res.redirect('/auth/login');
}

exports.indexMyProjects = (req, res) => {
    Project.find({ leader: req.session.user.id, isArchived: false })
        .then(projects => {
            res.render('project/index', {user: req.session, type: 'leader', projects: projects});
        })
        .catch(err => {
            res.render('error', {message: err.message, error: err});
        })
}

exports.indexCollaborations = (req, res) => {
    Project.find({ "collaborators._id": req.session.user.id}).populate('collaborators')
        .then(projects => {
            res.render('project/index', {user: req.session, type: 'leader', projects: projects});
        })
        .catch(err => {
            res.render('error', {message: err.message, error: err});
        })
}

exports.indexArchived = (req, res) => {
    Project.find({ leader: req.session.user.id, isArchived: true })
        .then(projects => {
            res.render('project/index', {user: req.session, type: 'archived', projects: projects});
        })
        .catch(err => {
            res.render('error', {message: err.message, error: err});
        })
}