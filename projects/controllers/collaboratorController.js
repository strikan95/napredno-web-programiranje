const Project = require("../model/project");
const User = require("../model/user");

const ProjectAuthorizer = require('../middlewares/projectAuthorizer')

exports.renderAddCollaboratorView = (req, res) => {
    res.render('collaborator/add', {user: req.session.user, projectId: req.params.id});
}

exports.saveCollaborator = async (req, res) => {
    const projectId = req.params.id;
    const userEmail = req.body.email;

    const user = await User.findOne({email: userEmail});
    if(!user)
    {
        return res.render('error', {message: 'user with email ' + userEmail + 'doesnt exist.'});
    }

    const project = await Project.findById(projectId).populate('collaborators')
        .catch((err) => {
            res.render('error', {message: err.message, error: err})
        })

    if (ProjectAuthorizer.isLeader(project, req.session.user)) {
        project.collaborators.push({user: user._id.toString(), isActive: true});
        project.save();
        res.redirect('/projects/' + project._id.toString());
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}

exports.removeCollaborator = async (req, res) => {
    const projectId = req.params.id;
    const collabId = req.params.collabId;

    const project = await Project.findById(projectId)
        .catch((err) => {
            res.render('error', {message: err.message, error: err})
        })

    if (ProjectAuthorizer.isLeader(project, req.session.user)) {
        const collab = project.collaborators.id(collabId);
        collab.isActive = false;
        project.save();
        res.redirect('/projects/' + project._id.toString());
    } else {
        res.render('error', {message: 'Unauthorized action'})
    }
}
