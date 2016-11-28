module.exports = class Users extends Array{
    constructor(){
        super();
    }
    create(arg){
        let button = true;
        this.forEach(function(value){
            if(value.name == arg.name) button = false;
        });
        if(button){
            this.push({name: arg.name, score: arg.score});
            return `Был зарегестрирован пользователь с именем: <b><i>${arg.name}</i></b> и с уровнем: <b>${arg.score}</b>`;
        }else return `Такой пользователь уже существует`;
    }
    read(arg){
        var newMass;
        arg.offset = arg.offset ? arg.offset : 0;//Если указан параметр offset
        arg.limit = arg.limit ? (arg.limit * 1 + arg.offset * 1) : Infinity;//Если указан параметр Limit
        arg.name ? //Есть ли параметр имя
            newMass = this.filter((value, number) => value.name == arg.name && number >= arg.offset && number < arg.limit)
            : arg.score ? //Есть ли параметр score
                newMass = this.filter((value, number) => value.score == arg.score && number >= arg.offset && number < arg.limit)
                : arg.id ? //Есть ли параметр id
                    newMass = this[arg.id] : newMass = this.filter((value, number) => number >= arg.offset && number < arg.limit);
        return newMass;
    }
    update(arg){
        var newMass;
        var name, score;
        this.forEach(value =>  {value.name == arg.name ? name = true : name = false});
        this.forEach(value =>  {value.score == arg.score ? score = true : score = false});
        arg.name ? //Есть ли параметр имя
            name ? //Есть ли имя в базе данных
                newMass = this.map(value => value.name == arg.name ? {name: arg.set, score: value.score} : {name: value.name, score: value.score})
                : newMass = 'Данного имени нету в базе данных'
            : arg.score ? //Есть ли параметр score
                score ? //Есть ли данный score в базе данных
                    newMass = this.map(value => value.score == arg.score ? {name: value.name, score: arg.set} : {name: value.name, score: value.score})
                    : newMass = 'Объекта с данным значением score нету в базе данных'
                : newMass = 'Не указан параметр запроса';
        return newMass;
    }
}