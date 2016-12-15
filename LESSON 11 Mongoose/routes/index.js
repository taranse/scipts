const express = require('express');
const router = express.Router();
const User = require('models/user').User;
const Task = require('models/task').Task;

/* GET home page. */
router.get('/', function(req, res, next) {
    User.find({}, (err, users) => users)
        .then((users) => {
            return new Promise(function(resolve, reject) {
                User.findById(req.session.user, function (err, user) {
                    if(err) reject(err);
                    if(!user) resolve([user, users]);
                    else res.redirect('/login');
                })
            })
        })
        .then(function(resolve) {
            Task.find({}, function(err, task) {
                return task;
            })
        })
        .then(function(resolve) {
            res.send(resolve)
        })
        .catch(function(err) {next(err)});

});

module.exports = router;