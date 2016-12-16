const express = require('express');
const router = express.Router();
const User = require('models/user').User;
const Task = require('models/task').Task;
let getUsers = new Promise((resolve, reject) => {
    User.find({}, function(err, users) {
        resolve(users);
    })
})
/* GET home page. */
router.get('/', function(req, res, next) {
    const obj = {};
    getUsers
        .then(function(users) {
           return new Promise((resolve, reject) => {
               User.findById(req.session.user, function (err, user) {
                   if(err) reject(err);
                   if(user) {
                       obj.user = user;
                       obj.users = users;
                       resolve(obj);
                   }
                   // else console.log(123);
                   else res.redirect('/login');
               });
           })
        })
        .then(obj => {
            return new Promise((resolve, reject) => {
                Task.find({}, function (err, task) {
                    if(err) reject(err);
                    obj.task = task;
                    resolve(obj);
                });
            });
        })
        .then(obj => {
            // res.json(obj)
            res.render('index', {resolve: obj});
        })
        .catch(function (resolve) {
            next(resolve);
        })
});
router.post('/exit', function (req, res) {

    res.redirect('/login');
});

module.exports = router;