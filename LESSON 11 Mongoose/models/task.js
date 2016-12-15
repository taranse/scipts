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
    username: {
        type: Schema.Types.ObjectId,
        required: true
    }
});
exports.Task = mongoose.model('Task', schema);