var express = require('express');
var router = express.Router();
var Authorizer = require('../middlewares/Authorizer')


//var UserService = require('../service/user')
var DashboardController = require('../controllers/dashboardController')

router.get('/', Authorizer.requireLogin, DashboardController.renderDashboard)
router.get('/projects/leader', Authorizer.requireLogin, DashboardController.indexMyProjects);
router.get('/projects/contribution', Authorizer.requireLogin, DashboardController.indexCollaborations);
router.get('/projects/archived', Authorizer.requireLogin, DashboardController.indexArchived);

module.exports = router;