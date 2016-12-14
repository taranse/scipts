const express = require('express');
const path = require('path');
const cookieParser = require('cookie-parser');
const bodyParser = require('body-parser');
const config = require('config');
const logger = require('log4js').getLogger();
let index = require('./routes/index');
let users = require('./routes/users');

let app = express();
app.listen(config.get('port'));
// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.get('/', index);
app.use('/login', users);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  let err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};
  logger.error(err.message);
  // render the error page
  res.status(err.status || 500);
  res.render('error');
});
//Создание пользователей в базе
require('./createDb');
logger.info('Server running on port: ' + config.get('port'));
module.exports = app;
