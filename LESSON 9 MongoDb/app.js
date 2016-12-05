const mongodb = require('mongodb');
const dbclient = mongodb.MongoClient;
const urlDb = 'mongodb://127.0.0.1:27017/nodeLessons';

dbclient.connect(urlDb, (err, db) => {
    if(err) console.log(err);
    else {
        console.log('Соединение установлено с адресом ', urlDb);
        var collection = db.collection('users');

        let user1 = {name: 'Denis', age: 17, born: new Date(1999,10,15)};
        let user2 = {name: 'Anastasiya', age: 15, born: new Date(2001,8,19)};
        let user3 = {name: 'Vladimir', age: 22, born: new Date(1994,2,1)};

        collection.insert([user1, user2, user3], (err, result) => {
            if(err) console.log(err);
            else {
                collection.find({age: {$lte: 17}}).toArray((err, result) => { //Возраст меньше либо равно 17
                    if(err) console.log(err);
                    else if(result.length) console.log("Найден документ", result);
                    else console.log('Документов не найдено');
                });
                collection.update({name: 'Denis'}, {$set: {name: 'Vanya', age: 14}}); //Меняем имя и возраст
                collection.find({age: {$gt: 17}}).toArray((err, result) => { //Возраст больше 17
                    if(err) console.log(err);
                    else if(result.length) console.log("Найден документ", result);
                    else console.log('Документов не найдено');
                });
                collection.find({age: {$ne: 17}}).toArray((err, result) => { //Возраст не равен 17
                    if(err) console.log(err);
                    else if(result.length) console.log("Найден документ", result);
                    else console.log('Документов не найдено');
                });
                collection.find({$or: [{age: {$lt: 17}},{name: 'Vanya'}]}).toArray((err, result) => { //Возраст меньше 17 или зовут Денис
                    if(err) console.log(err);
                    else if(result.length) console.log("Найден документ", result);
                    else console.log('Документов не найдено');
                });
                collection.remove();
            }
        });
        
    }
});