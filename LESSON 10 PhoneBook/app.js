const mongodb = require('mongodb');
const dbclient = mongodb.MongoClient;
const express = require('express');
const app = express();
const port = process.env.PORT || 80;
const server = require('http').Server(app);
const urlDb = 'mongodb://127.0.0.1:27017/nodeLessons';
const jade = require('jade');
const bodyParser = require("body-parser");
//----------------------------------------------------
const api = require('./api/index');


server.listen(port);

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({"extended": true}));

app.use(express.static(__dirname + '/'));
app.use('/api', api);
app.use('/', (req, res, next) => {
    let errorName, errorPhone;
    app.get('ErrorName') ?  errorName = app.get('ErrorName') :  errorName = null;
    app.get('ErrorPhone') ?  errorPhone = app.get('ErrorPhone') :  errorPhone = null;
    app.disable('ErrorName');
    app.disable('ErrorPhone');
    dbclient.connect(urlDb, (err, db) => {
        if (err) console.log(err);
        else {
            let collection = db.collection('phone_book');
            console.log('Соединение установлено с адресом ', urlDb);
            collection.find({}).toArray((err, result) => { //Возраст меньше либо равно 17
                if(err) console.log(err);
                app.use(express.static(__dirname + '/'));
                res.end(jade.renderFile('index.jade', {result: result, error: {name: errorName, phone: errorPhone}}));
            });
        }
    });
});
app.use(function (err, req, res, next) {
    console.log(err.stack);
    res.send('Ошибка');
});