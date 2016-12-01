//Функции чата

let chatOnMessage = (message) => {
    console.log(message);
};
exports.chatOnMessage =  chatOnMessage;
const ChatApp = require('./chatAppClass').ChatApp;
let webinarChat =  new ChatApp('webinar');
let facebookChat = new ChatApp('=========facebook');
let vkChat =       new ChatApp('---------vk');


vkChat.setMaxListeners(2); //Максимальное количество обработчиков
setTimeout( ()=> {
  if(vkChat._eventsCount) {
    console.log('Закрываю вконтакте...');
    vkChat.removeListener('message', chatOnMessage);
  }
}, 2000 );

// Закрыть фейсбук
setTimeout( ()=> {
  console.log('Закрываю фейсбук, все внимание — вебинару!');
  facebookChat.removeListener('message', chatOnMessage);
}, 15000 );
setTimeout( ()=> {
    console.log('Функция вебинара');
    webinarChat.emit('message', chatOnMessage);
}, 30000 );

module.exports.webinarChat = webinarChat;
module.exports.facebookChat = facebookChat;
module.exports.vkChat = vkChat;