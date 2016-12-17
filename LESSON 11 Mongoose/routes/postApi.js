const express = require('express');
const router = express.Router();
const User = require('models/user').User;
const Task = require('models/task').Task;

router.post('/create/task', function (req, res, next) {
    let body = req.body;
    let task = new Task({
        taskname: body.name,
        text: body.text,
        username: body.usertask,
        dateFinish: body.finish
    });
    task.save((err, task) => {
        User.findOne({username: task.username}, (err, user) => {
            if (err) next(err);
            else {
                user.taskList.push(task._id);
                user.save((err, user) => {res.redirect('/')});
            }
        })
    })

});

module.exports = router;
