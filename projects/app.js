var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');

var session = require('express-session');
var passport = require('passport');
const MongoDBStore = require('connect-mongodb-session')(session);


var User = require("./model/user");

var db = require('./model/db');

var authRouter = require('./routes/authRouter');
var dashboardRouter = require('./routes/dashboardRouter');
var projectsRouter = require('./routes/projectRouter');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

const store = new MongoDBStore({
  uri: 'mongodb+srv://db_user:j5JlBRo2SkHoLh1q@napredno-web-programira.dmbnbiw.mongodb.net/?retryWrites=true&w=majority',
  collection: 'sessions'
});

app.use(session({
  secret: 'keyboard cat',
  resave: false, // don't save session if unmodified
  saveUninitialized: false, // don't create session until something stored
  store: store
}));

app.use('/auth', authRouter);
app.use('/me', dashboardRouter);
app.use('/projects', projectsRouter);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
