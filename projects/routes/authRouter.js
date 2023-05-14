var express = require('express');
var router = express.Router();

var AuthController = require('../controllers/authController');

// ---------------------------- VIEWS ---------------------------- //
router.get('/register', AuthController.renderRegisterView);
router.get('/login', AuthController.renderLoginView)

// ---------------------------- ACTION ROUTES ---------------------------- //
router.post('/register', AuthController.register);
router.post('/login', AuthController.login);
router.get('/logout', AuthController.logout);

module.exports = router;