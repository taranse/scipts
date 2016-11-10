const EventEmitter = require('events');

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
    console.log('Чат вконтакте закрылся :(');
    this.removeListener('message', chatOnMessage);
  }
}

let webinarChat =  new ChatApp('webinar');
let facebookChat = new ChatApp('=========facebook');
let vkChat =       new ChatApp('---------vk');

let chatOnMessage = (message) => {
  console.log(message);
};
vkChat.setMaxListeners(2); //Максимальное количество обработчиков
webinarChat.on('message', chatOnMessage);
facebookChat.on('message', chatOnMessage);
vkChat.on('message', chatOnMessage);

webinarChat.emit('message', 'Готовлюсь к ответу'); //обработчик 'Готовлюсь к ответу'
vkChat.emit('message', 'Готовлюсь к ответу'); //обработчик 'Готовлюсь к ответу'
vkChat.close(); //Закрылся чат вк

// Закрыть вконтакте

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