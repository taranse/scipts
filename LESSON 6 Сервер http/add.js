module.exports = class Sklad extends Array{
    constructor(){
        super();
        this.push('');
    }
    add(arg){
        this.push({name: arg.name, count: arg.count})
    }
    get response() {
        return `Идентефикатор товара "${this[this.length-1].name}" - ${this.length-1}\nКоличество товара - ${this[this.length-1].count}`
    }
    update(id, count){
        this[id].count = count;
    }
    get cl() {
        return this.length;
    }
}