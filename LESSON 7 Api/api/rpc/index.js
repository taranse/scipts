const express = require("express");
let app = module.exports = express();
//----------------------------------

app.post('/rpc', (req, res) => {
    res.send('13');
});