const express = require('express');
const router = express.Router();
const User = require('models/user').User;

/* GET home page. */
router.get('/', function(req, res, next) {
    User.find({}, (err, users) => users)
        .then((users) => {
            User.findById(req.session.user, function (err, user) {
                if(!user) res.render('index', {user: user, users: users});
                else res.redirect('/login');
            })
        })
        .catch(function(err) {next(err)});

});

module.exports = router;