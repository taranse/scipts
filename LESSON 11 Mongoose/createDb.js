const mongoose = require('libs/mongoose');
const User = require('models/user').User;
const logger = require('log4js').getLogger();

let connect = new Promise((resolve, reject) => mongoose.connection.on('open', () => resolve()) );

let admin = new User({username: 'Admin',password: 'admin', usertype: 1});
let test1 = new User({username: 'test1',password: '123'});
let test2 = new User({username: 'test2',password: '123'});

//Сохраняем 3 юзеров для проверки функций
module.exports = connect
    .then(() => {
        let db = mongoose.connection.db;
        db.dropDatabase(err => {
            if (err) throw new Error('Невозможно удалить базу');
        });
    })
    .then(() => Promise.all([
        admin.save((err) => {if(err) throw new Error('Невозможно сохранить пользователя')}),
        test1.save((err) => {if(err) throw new Error('Невозможно сохранить пользователя')}),
        test2.save((err) => {if(err) throw new Error('Невозможно сохранить пользователя')})
    ]))
    .then(() => mongoose.disconnect())
    .catch(rej => console.log(rej));