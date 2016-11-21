module.exports = class Sklad extends Array{
    constructor(){
        super();
        this.push('');
    }
    add(arg){
        var sw = true, r;
        this.forEach((val, i) => {
            if(val.name == arg.name) sw = false;
        });
        if(sw){
            this.push({name: arg.name, count: arg.count});
            r = {id: this.length, name: arg.name, count: arg.count};
        }
        else r = 'Данный товар уже добавлен на склад';
        return r
    }
    update(id, count){
        this[id].count = count;
        return {id:id, name: this[id].name, count: count }
    }
    get cl() {
        return this.length;
    }
    getSklad(){
        var r = new Array();
        this.forEach((val, i) => {
            if(typeof val.name != 'undefined') r.push({id: i, name: val.name, count: val.count});
        });
        r.length ? r = r : r = 'Склад пуст';
        return r;
    }
    delete(id){
        var r = typeof this[id] == 'undefined' ? 'Товара с идентификатором ' + id + ' не существует' : JSON.stringify(this[id]);
        delete this[id];
        return r;
    }
}