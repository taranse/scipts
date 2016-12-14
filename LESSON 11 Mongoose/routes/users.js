const express = require('express');
const router = express.Router();

router.get('/', function(req, res, next) {
  res.render('login', { title: 'Авторизация' });
});
router.post('/enter', function (req, res, next) {
  res.end(req.body.username);
});
module.exports = router;
