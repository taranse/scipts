const crypto = require('crypto');
const mongoose = require('libs/mongoose'), Schema = mongoose.Schema;
const schema = new Schema({
    username: {
        type: String,
        unique: true,
        required: true
    },
    hashedPassword: {
        type: String,
        required: true
    },
    salt: {
        type: String,
        required: true
    },
    taskList: {
        type: Schema.Types.ObjectId
    },
    usertype: {
        type: Number,
        default: 2
    }
});
schema.methods.encryptPassword = function(password) {
    return crypto.createHash('md5', this.salt).update(password).digest('hex')
};
schema.virtual('password')
    .set(function(password){
        this._plainPassword = password;
        this.salt = Math.random() + '';
        this.hashedPassword = this.encryptPassword(password);
    })
    .get(function() { return this._plainPassword });
schema.methods.checkPassword = function(password) {
    return this.encryptPassword(password) === this.hashedPassword;
};
schema.statics.authorize = function (username, password, callback) {
    let User = this;
    User.findOne({username: username},  (err, user) => user)
        .then(user => {
            return new Promise((resolve, reject) => {
                if(user) {
                    if (user.checkPassword(password)) resolve(user);
                    else reject('Неверный пароль')
                }else{
                    reject('Пользователь не найден')
                }
            })
        })
        .then(function(user) {callback(null, user)})
        .catch(function(err) {
            callback(new Error(err));
        })
}
exports.User = mongoose.model('User', schema);