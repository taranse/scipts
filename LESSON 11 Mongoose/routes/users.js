const express = require('express');
const router = express.Router();
const User = require('models/user').User;

router.get('/', function(req, res, next) {
  res.render('login');
});
router.post('/enter', function (req, res, next) {
  let username = req.body.username;
  let password = req.body.password;
  User.authorize(username, password, function (err, user) {
      if(err) next(err);
      req.session.user = user._id;
      res.redirect('/');
  })

});
module.exports = router;
