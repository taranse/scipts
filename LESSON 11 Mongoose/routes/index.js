var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  "use strict";
  res.end('123');
});

module.exports = router;
