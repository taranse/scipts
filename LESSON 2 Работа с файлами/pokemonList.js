class PokemonList{
    constructor(...list) {
        for(var i in list){
            this[list[i].name] = list[i].level
        }
    }
    add(...list) {
        this[list[0]] = list[1];
    }
    move(names, list){
        list[names] = this[names];
        delete this[names];
    }
    showList(){
        let mass = [];
        var l = 0;
        for(var i in this){
            if(typeof this[i] == "number"){
                mass.push(`${i} - ${this[i]}`);
                l++;
            }
        }
        console.log(`Количество покемонов в списке: ${l}\n${mass}`);
    }
    max(){
        let mass = [];
        for(let i in this){
            if(typeof this[i] == "number") mass.push(this[i]);
        }
        this.valueOf = () => Math.max(...mass);
        console.log(+this)
    }
}
module.exports = {PokemonList};