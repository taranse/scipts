const express = require("express");
let app = module.exports = express();
const mongodb = require('mongodb');
const dbclient = mongodb.MongoClient;
const urlDb = 'mongodb://127.0.0.1:27017/nodeLessons';
const bodyParser = require("body-parser");
//----------------------------------


app.use(bodyParser.json());
app.use(bodyParser.urlencoded({"extended": true}));


app.post('/',(req,res, next) => {
    let body = req.body;
    var str = /\d/g;
    var numb = /\D/g;
    if(str.exec(body.name)) {
        app.set('ErrorName', 'Неверный формат имени');
        res.redirect('/');
    }else if(numb.exec(body.phone)){
        app.set('ErrorPhone', 'Неверный формат телефона');
        res.redirect('/');
    }else {
        dbclient.connect(urlDb, (err, db) => {
            if (err) console.log(err);
            else {
                let collection = db.collection('phone_book');
                collection.find({phone: body.phone}).toArray((err, result) => { //Возраст меньше либо равно 17
                    if(err) console.log(err);
                    else if(result.length == 0){
                        let attr = {};
                        body.attr && body.attrVal ? attr[body.attr] = body.attrVal : false;
                        collection.insert({name: body.name, phone: body.phone, attr: attr}, (err, result) => { //Возраст меньше либо равно 17
                            if (err) console.log(err);
                            res.redirect('/');
                        });
                    }
                    else{
                        app.set('ErrorPhone', 'В вашей записной книжке уже есть этот телефон');
                        res.redirect('/');
                    }
                });

            }
        });
    }
});
app.get('/delete/:id', (req, res, next) => {
    dbclient.connect(urlDb, (err, db) => {
        if (err) console.log(err);
        else {
            let collection = db.collection('phone_book');
            collection.remove({phone: req.params.id});
            res.redirect('/');
        }
    });
});
app.post('/update/:id', (req, res, next) => {
    dbclient.connect(urlDb, (err, db) => {
        if (err) console.log(err);
        else {
            let collection = db.collection('phone_book');
            collection.update({phone: req.params.id}, req.body);
            res.redirect('/');
        }
    });
});