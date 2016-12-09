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

app.post('/api',(req,res, next) => {
    let body = req.body;
    if(!isNaN(+body.name)){
        next('error');
    }else {
        dbclient.connect(urlDb, (err, db) => {
            if (err) console.log(err);
            else {
                let collection = db.collection('phone_book');
                collection.insert({name: body.name, phone: body.phone}, (err, result) => { //Возраст меньше либо равно 17
                    if (err) console.log(err);
                    res.writeHead(302, {'Location': '/'});
                    res.end();
                });
            }
        });
    }
});
app.use('/', (req, res, next) => {
    dbclient.connect(urlDb, (err, db) => {
        if (err) console.log(err);
        else {
            let collection = db.collection('phone_book');
            console.log('Соединение установлено с адресом ', urlDb);
            collection.find({}).toArray((err, result) => { //Возраст меньше либо равно 17
                if(err) console.log(err);
                res.end(jade.renderFile('index.jade', {result: result}));
            });
        }
    });
});
app.use(function (err, req, res, next) {
    console.log(err.stack);
    res.send('Ошибка');
});