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
        type: Schema.Types.ObjectId,
    }
});
schema.methods.encryptPassword = password => crypto.createHash('md5', this.salt).update(password).digest('hex');
schema.virtual('password')
    .set(function(password){
        this._plainPassword = password;
        this.salt = Math.random() + '';
        this.hashedPassword = this.encryptPassword(password);
    })
    .get(() => this._plainPassword);
schema.methods.checkPassword = password => this.encryptPassword(password) === this.hashedPassword;
exports.User = mongoose.model('User', schema);