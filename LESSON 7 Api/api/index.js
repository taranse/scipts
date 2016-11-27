const express = require("express");
let app = module.exports = express();
//----------------------------------

let rest = require('./rest');
let rpc = require('./rpc');

app.use('/api/v1', rest);
app.use('/rpc', rpc);