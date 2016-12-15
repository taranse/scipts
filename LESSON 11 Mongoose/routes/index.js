const express = require('express');
const router = express.Router();
const User = require('models/user').User;

/* GET home page. */
router.get('/', function(req, res, next) {
  User.findById(req.session.user, function (err, user) {
      res.render('index', {
          userId: user
      })
  })
});

module.exports = router;
