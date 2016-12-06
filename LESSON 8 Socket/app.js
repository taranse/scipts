const express = require('express');
const app = express();
const port = process.env.PORT || 80;
const server = require('http').Server(app);
const io = require('socket.io')(server);
const log4js = require('log4js');
const logger = log4js.getLogger();

server.listen(port);

logger.debug('Script has been started...');
logger.debug(process.env);
app.use(express.static(__dirname + '/public'));

io.on('connection', function (socket) {
    socket.on('userName', function(data){
        socket.broadcast.emit('newUser', data);
        logger.info(data + ' connected to chat!');
        socket.on('message', function(msg){
            io.sockets.emit('messageToClients', msg, data);
        });
    });


});
io.on('disconnection', function (socket) {
    console.log(socket);

})