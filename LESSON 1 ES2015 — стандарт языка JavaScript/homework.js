class PokemonList extends Array{
    constructor(...list) {
        super();
        list.forEach(item => this.push(item));
    }
    add(...list) {
        this.push({name:list[0],level:list[1]})
    }
    move(names, list){
        this.forEach((item, i) => {
            if (item.name == names) {
            list.push({name: item.name,level:item.level});
            delete this[i];
        }
    });
    }
    showList(){
        let mass = [];
        this.forEach(item => Number.isInteger(item.level) ? mass.push(` ${item.name} - ${item.level}`) : false);
        console.log(`Количество покемонов в списке: ${mass.length}\n ${mass}`);
    }
    max(){
        let mass = [];
        this.forEach(item => Number.isInteger(item.level) ? mass.push(item.level) : false);
        this.valueOf = () => Math.max(...mass);
        console.log(+this)
    }
}

class Pokemon {
    constructor(...list) {
        let [name, level] = list;
        this.name = name;
        this.level = level;
    }
    show() {
        console.log(`Покемон: ${this.name} - Уровень: ${this.level}`);
    }
    set levelUp(level) {
        this.level += level;
    }
}
var Pickachu = {name: 'Pickachu',level: 13};
var Bulbasaur = {name: 'Bulbasaur',level: 21};
var Charmander = {name: 'Charmander',level: 25};
var Meowt = {name: 'Meowt',level: 13};
const list = [Pickachu,Bulbasaur,Charmander,Meowt];

const object = list.map(
        obj => new Pokemon(obj.name, obj.level)
);
object[2].levelUp = 33;
object[3].show();
const lost = new PokemonList(...object.slice(0,2));
const found = new PokemonList(...object.slice(2));
found.add('Verona', 41);
found.max();
lost.move('Bulbasaur', found);
found.move('Meowt', lost);
found.showList();
lost.showList();
