const mongoose = require('libs/mongoose');
const User = require('models/user').User;
const logger = require('log4js').getLogger();

let db = mongoose.connections.db;