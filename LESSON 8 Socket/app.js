const express = require('express');
const app = express();
const port = process.env.PORT || 80;
const server = require('http').Server(app);
const io = require('socket.io')(server);
const log4js = require('log4js');
const logger = log4js.getLogger();

server.listen(port);

logger.debug('Script has been started...'); // Логгируем.
app.use(express.static(__dirname + '/public'));

io.on('connection', function (socket) {
    var name = 'U' + (socket.id).toString().substr(1,4);
    socket.broadcast.emit('newUser', name);

    logger.info(name + ' connected to chat!');
    socket.emit('userName', name);
    // Обработчик ниже // Мы его сделали внутри коннекта

    socket.on('message', function(msg){ // Обработчик на событие 'message' и аргументом (msg) из переменной message
        logger.warn('-----------'); // Logging
        logger.warn('User: ' + name + ' | Message: ' + msg);
        logger.warn('====> Sending message to other chaters...');
        io.sockets.emit('messageToClients', msg, name); // Отправляем всем сокетам событие 'messageToClients' и отправляем туда же два аргумента (текст, имя юзера)
    });
});