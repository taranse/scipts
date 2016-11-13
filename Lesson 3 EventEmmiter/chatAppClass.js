const EventEmitter = require('events');
const chatOnMessage = require('./chat').chatOnMessage;
class ChatApp extends EventEmitter {
    /**
     * @param {String} title
     */
    constructor(title) {
        super();

        this.title = title;

        // Посылать каждую секунду сообщение
        setInterval(() => {
            this.emit('message', `${this.title}: ping-pong`);
        }, 1000);
    }
    close(){
        this.emit('message', 'Чат вконтакте закрылся :('); //Вызов посредством emmit как в комментариях к дз
        this.removeListener('message', chatOnMessage);
    }
}
exports.ChatApp = ChatApp;