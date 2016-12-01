//Обработчики и вывод чата
const webinarChat = require('./chat').webinarChat;
const facebookChat = require('./chat').facebookChat;
const vkChat = require('./chat').vkChat;
const chatOnMessage = require('./chat').chatOnMessage;

webinarChat.on('message', chatOnMessage);
facebookChat.on('message', chatOnMessage);
vkChat.on('message', chatOnMessage);

webinarChat.emit('message', 'Готовлюсь к ответу'); //обработчик 'Готовлюсь к ответу'
vkChat.emit('message', 'Готовлюсь к ответу'); //обработчик 'Готовлюсь к ответу'

vkChat.close(); //Закрылся чат вк