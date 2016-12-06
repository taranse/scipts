const express = require('express');
const app = express();
const port = process.env.PORT || 80;
const server = require('http').Server(app);
const io = require('socket.io')(server);
const log4js = require('log4js');
const logger = log4js.getLogger();

server.listen(port);

logger.debug('Script has been started...');
app.use(express.static(__dirname + '/public'));

io.on('connection', function (socket) {
    socket.on('userName', function(data){
        socket.join(data.room);
        socket.broadcast.to(data.room).emit('newUser', data.name);
        logger.info(data.name + ' connected to chat!');
        socket.on('message', function(msg){
            io.to(data.room).emit('messageToClients', msg, data.name);
        });
    });


});
io.on('disconnection', function (socket) {
    console.log(socket);

})