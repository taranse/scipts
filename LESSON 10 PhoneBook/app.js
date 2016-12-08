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

server.listen(port);

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({"extended": true}));

app.post('/',(req,res, next) => {
    var body = req.body;
    var collection = db.collection('phones');
    collection.find({name: body.name, phone: body.phone}).toArray((err, result) => { //Возраст меньше либо равно 17
        if(err) console.log(err);
        else if(result.length) console.log("Найден документ", result);
        else console.log('Документов не найдено');
    });
    res.end(next());
});
app.use('/', (req, res, next) => {
    dbclient.connect(urlDb, (err, db) => {
        if (err) console.log(err);
        else {
            console.log('Соединение установлено с адресом ', urlDb);
            var collection = db.collection('phones');
            collection.find().toArray((err, result) => { //Возраст меньше либо равно 17
                if(err) console.log(err);
                else if(result.length) console.log("Найден документ", result);
                else console.log('Документов не найдено');
            });
        }
    });
    res.send(jade.renderFile('index.jade'));
});
app.use(function (err, req, res, next) {
    console.log(err.stack);
    res.send('Ошибка');
});