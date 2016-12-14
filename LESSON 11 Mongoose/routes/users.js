const express = require('express');
const router = express.Router();
const User = require('models/user').User;

router.get('/', function(req, res, next) {
});
router.post('/enter', function (req, res, next) {
  let username = req.body.username;
  let password = req.body.username;
  // res.json(req.body);

});
module.exports = router;
