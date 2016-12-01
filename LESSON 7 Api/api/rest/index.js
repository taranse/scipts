const express = require("express");
let app = module.exports = express();
//----------------------------------

var heandler = {
    create: (data) => {
        if(data.name == '' || data.score == '' || typeof data.name == 'undefined' || typeof data.score == 'undefined')
            return 'Error';
        else return users.create(data);
    },
    read: (data) => users.read(data),
    update: (data) => users.update(data),
    delete: (data) => users.del(data)
};
app.get('/:method', (req, res) => {
    let method = req.params.method;
    res.send(heandler[method](req.query));
});