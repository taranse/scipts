
socket.on('newUser', function(userName){
    $('div.chat').append(`<i><span>${userName}</span> - Подключился к чату</i><br/>`);

});
$(document).on('click', 'button.chat', function(){
    var message = $('input.chat').val();
    socket.emit('message', message);
    $('input').val(null);
});
socket.on('messageToClients', function(msg, name){
    $('div.chat').append(`<b>${name}</b>: <span class="message">${msg}</span><br/>`);
});