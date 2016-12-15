const express = require('express');
const router = express.Router();
const User = require('models/user').User;
const Task = require('models/task').Task;
const obj = {};
let getUsers = new Promise((resolve, reject) => {
    User.find({}, function(err, users) {
        resolve(users);
    })
})
/* GET home page. */
router.get('/', function(req, res, next) {
    getUsers
        .then(users => {
            User.findById(req.session.user, function (err, user) {
                if(err) reject(err);
                if(!user) {
                    obj.user = user;
                    obj.users = users;
                }
                else res.redirect('/login');
            });
            return obj;
        })
        .then(obj => {
            Task.find({}, function (err, task) {
                if(err) throw err;
                obj.task = task;
            });
            return obj;
        })
        .then(obj => {
            res.render('index', {resolve: obj});
        })
        .catch(function (resolve) {
            next(resolve);
        })
});

module.exports = router;