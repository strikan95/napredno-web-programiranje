const Project = require("../model/project");
const mongoose = require("mongoose");

const ProjectAuthorizer = require('../middlewares/projectAuthorizer')

// -------------------------------- Views --------------------------------
exports.index = (req, res) => {
    Project.find({})
        .then((projects) => {
            res.render('project/index', {user: req.session.user, projects: projects})
        })
        .catch((err) => {
            res.render('error', {message: err.message, error: err});
        });
}

exports.show = (req, res) => {
    const projectId = req.params.id;
    Project.findOne({_id: projectId}).populate('collaborators.user')
        .then((project) => {
            res.render('project/show', {user: req.session.user, project: project})
        })
        .catch((err) => {
            res.render('error', {message: err.message, error: err});
        });
}

exports.create = (req, res) => {
    return res.render('project/create', {user: req.session.user});
}

// -------------------------------- Actions --------------------------------
exports.store = (req, res) => {
    const projectData = req.body;

    Project.create(
        {
            leader: req.session.user.id,
            title: projectData.title,
            description: projectData.description,
            price: projectData.price,
            startDate: projectData.startDate,
            endDate: projectData.endDate,
            isArchived: false
        }
    )
        .then(project => {
            const projectId = project.id;
            res.redirect('/projects/' + projectId);
        })
        .catch(err => {
            res.render('error', {message: err.message, error: err});
        });
}

exports.archive = async (req, res) => {
    const projectId = req.params.id;
    const project = await Project.findById(projectId)
        .catch((err) => {
            res.render('error', {message: err.message, error: err});
        });

    if (ProjectAuthorizer.isLeader(project, req.session.user)) {
        project.isArchived = true;
        project.save();
        res.redirect('/me');
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}

exports.delete = async (req, res) => {
    const projectId = req.params.id;
    const project = await Project.findById(projectId)
        .catch((err) => {
            res.render('error', {message: err.message, error: err});
        });

    if (ProjectAuthorizer.isLeader(project, req.session.user)) {
        Project.findByIdAndDelete({_id: projectId})
            .then((project) => {
                res.redirect('/me');
            })
            .catch((err) => {
                res.render('error', {message: err.message, error: err});
            });
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}