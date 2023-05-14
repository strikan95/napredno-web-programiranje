const Project = require("../model/project");

const ProjectAuthorizer = require('../middlewares/projectAuthorizer')

exports.renderAddTaskView = (req, res) => {
    res.render('task/create', {user: req.session.user, projectId: req.params.id});
}

exports.renderEditTaskView = (req, res) => {
    res.render('task/edit', {user: req.session.user, projectId: req.params.id, taskId: req.params.taskId});
}

exports.addTask = async (req, res) => {
    const projectId = req.params.id;
    const project = await Project.findById(projectId).populate('collaborators')
        .catch((err) => {
            res.render('error', {message: err.message, error: err})
        })

    if (ProjectAuthorizer.isLeader(project, req.session.user) || ProjectAuthorizer.isParticipant(project, req.session.user)) {
        project.tasks.push({text: req.body.text});
        project.save();
        res.redirect('/projects/' + project._id.toString());
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}

exports.editTask = async (req, res) => {
    const projectId = req.params.id;
    const taskId = req.params.taskId;

    const project = await Project.findById(projectId).populate('collaborators')
        .catch((err) => {
            res.render('error', {message: err.message, error: err})
        })

    if (ProjectAuthorizer.isLeader(project, req.session.user) || ProjectAuthorizer.isParticipant(project, req.session.user)) {
        const task = project.tasks.id(taskId)
        task.text = req.body.text;
        project.save();
        res.redirect('/projects/' + project._id.toString());
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}

exports.deleteTask = async (req, res) => {
    const projectId = req.params.id;
    const taskId = req.params.taskId;

    const project = await Project.findById(projectId).populate('collaborators')
        .catch((err) => {
            res.render('error', {message: err.message, error: err})
        })

    if (ProjectAuthorizer.isLeader(project, req.session.user) || ProjectAuthorizer.isParticipant(project, req.session.user)) {
        const task = project.tasks.id(taskId).deleteOne()
        project.save();
        res.redirect('/projects/' + project._id.toString());
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}