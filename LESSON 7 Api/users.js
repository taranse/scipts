module.exports = class Users extends Array{
    constructor(){
        super();
    }
    create(arg){
        let button = true;
        this.forEach(function(i){
            if(i.name == arg.name) button = false;
        });
        if(button){
            this.push({name: arg.name, score: arg.score});
            return `Был зарегестрирован пользователь с именем: <b><i>${arg.name}</i></b> и с уровнем: <b>${arg.score}</b>`;
        }else return `Такой пользователь уже существует`;
    }
}