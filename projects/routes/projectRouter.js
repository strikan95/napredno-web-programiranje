var express = require('express');
var router = express.Router();
const Authorizer = require("../middlewares/Authorizer");
var ProjectController = require('../controllers/projectController');
var TaskController = require('../controllers/taskController');
var CollaboratorController = require('../controllers/collaboratorController');

// Project index view
router.get('/', Authorizer.requireLogin, ProjectController.index);

// Create project form
router.get('/create', Authorizer.requireLogin, ProjectController.create);

// Store project
router.post('/store', Authorizer.requireLogin, ProjectController.store);

// Add collaborator form
router.get('/:id/collaborators/add', Authorizer.requireLogin, CollaboratorController.renderAddCollaboratorView);

// Save collaborator
router.post('/:id/collaborators/save', Authorizer.requireLogin, CollaboratorController.saveCollaborator);

// Create task form
router.get('/:id/tasks/create', Authorizer.requireLogin, TaskController.renderAddTaskView);

// Store task
router.post('/:id/tasks/store', Authorizer.requireLogin, TaskController.addTask);

// Store task
router.get('/:id/tasks/:taskId/edit', Authorizer.requireLogin, TaskController.renderEditTaskView);

// Store task
router.post('/:id/tasks/:taskId/update', Authorizer.requireLogin, TaskController.editTask);

// Store task
router.post('/:id/tasks/:taskId/delete', Authorizer.requireLogin, TaskController.deleteTask);

// Remove collaborator
router.post('/:id/collaborators/:collabId/remove', Authorizer.requireLogin, CollaboratorController.removeCollaborator);


// Archive project
router.get('/:id/archive', Authorizer.requireLogin, ProjectController.archive);

// Delete project
router.get('/:id/delete', Authorizer.requireLogin, ProjectController.delete);

// Single project view
router.get('/:id', Authorizer.requireLogin, ProjectController.show);


module.exports = router;