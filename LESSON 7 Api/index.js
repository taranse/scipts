const express = require("express");
const app = express();
const bodyParser = require('body-parser');
//------------
const usersScript = require("./users");
let api = require('./api');
users = new usersScript;

app.use(bodyParser.json());
app.use('/', api);
app.use(function (err, req, res, next) {
   console.log(err.stack);
   res.send('Ошибка');
});

app.listen(1337);
