const express = require('express');
const path = require('path');
const cookieParser = require('cookie-parser');
const session = require('express-session');
const bodyParser = require('body-parser');
const config = require('config');
const logger = require('log4js').getLogger();
const MongoStore = require('connect-mongo')(session);
const mongoose = require('libs/mongoose');
const favicon = require('serve-favicon');
//---------------------------------------------------
let index = require('./routes/index');
let users = require('./routes/users');
let api = require('./routes/postApi');

require('./createDb');

let app = express();
app.listen(config.get('port'));
// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
app.use(favicon(__dirname + '/public/favicon.ico'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(session({
  secret: config.get('session:secret'),
  key: config.get('session:key'),
  cookie: config.get('session:cookie'),
  store: new MongoStore({mongooseConnection: mongoose.connection})
}));
// app.use(function (req, res, next) {
//     req.session.numberOfVisit = req.session.numberOfVisit + 1 || 1;
//     res.send('Visit: ' + req.session.numberOfVisit);
// });
app.use(express.static(path.join(__dirname, 'public')));
app.use('/', index);
app.use('/login', users);
app.use('/api', api);
// catch 404 and forward to error handler
app.use(function(req, res, next) {
  let err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};
  logger.error(err.message);
  // render the error page
  res.status(err.status || 500);
  res.render('error');
});
//Создание пользователей в базе
logger.info('Server running on port: ' + config.get('port'));
module.exports = app;
