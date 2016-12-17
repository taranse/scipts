const mongoose = require('libs/mongoose'), Schema = mongoose.Schema;
const schema = new Schema({
    taskname: {
        type: String,
        required: true
    },
    text:{
        type: Schema.Types.Mixed,
        required: true
    },
    admin: {
        type: String,
        default: "Admin"
    },
    username: {
        type: String,
        required: true
    },
    dateStart: {
        type: Date,
        default: Date.now
    },
    dateFinish: {
        type: Date,
        required: true
    },
    dataClose: {
        type: Date
    }
});
exports.Task = mongoose.model('Task', schema);