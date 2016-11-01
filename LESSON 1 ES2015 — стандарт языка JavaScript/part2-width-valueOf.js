class Lost {
  constructor(...params) {
    var i = 0;
    for (let name of params) {
      this[i] = name;
      i++;
    }
  }
  show() {
    var lenght = Object.keys(this).length;
    var mass = [];
    for(let i in this){
      mass.push(`
      ${this[i].name} - ${this[i].level}`);
    }
    console.log(`
      Количество Покемонов в списке Lost- ${lenght}
      Список покемонов: ${mass}
`);
  }  
  move(name, list){
    let lenght = Object.keys(list).length;
    list[lenght+1] = name;
    for(let i in this){
      if(this[i].name == name.name)
        delete this[i];
    }
  }
  max(){
    let mass = [];
    for(let i in this){
      mass.push(this[i].level);
    }
    this.valueOf = () => Math.max(...mass);
    console.log(+this)
  }
};
class Found {
  constructor(...params) {
    var i = 0;
    for (let name of params) {
      this[i] = name;
      i++;
    }
  }
  show() {
    var lenght = Object.keys(this).length;
    var mass = [];
    for(let i in this){
      mass.push(`
      ${this[i].name} - ${this[i].level}`);
    }
    console.log(`
      Количество Покемонов в списке Found - ${lenght}
      Список покемонов: ${mass}
`);
  }
  move(name, list){
    var lenght = Object.keys(list).length;
    list[lenght+1] = name;
    for(let i in this){
      if(this[i].name == name.name)
        delete this[i];
    }
  }
  max(){
    let mass = [];
    for(let i in this){
      mass.push(this[i].level);
    }
    this.valueOf = () => Math.max(...mass);
    console.log(+this)
  }
};

let Charmeleon = {name: 'Charmeleon',level: 10}
let Raichu = {name: 'Raichu',level: 11}
let Mankey = {name: 'Mankey',level: 12}
let Nidorino = {name: 'Nidorino',level: 13}
let Golbat = {name: 'Golbat',level: 9}

let Pickashu = {name: 'Pickashu',level: 14}
let Bulbasaur = {name: 'Bulbasaur',level: 15}
let Meawot = {name: 'Meawot',level: 16}
let Charmander = {name: 'Charmander',level: 17}
var pokemonLost = new Lost(Pickashu, Bulbasaur, Meawot, Charmander);
var pokemonFound = new Found(Charmeleon, Raichu, Mankey, Nidorino, Golbat);
// conosle.log(pokemon);
pokemonFound.move(Mankey, pokemonLost);
pokemonLost.move(Charmander, pokemonFound);
pokemonLost.move(Pickashu, pokemonFound);
pokemonLost.move(Bulbasaur, pokemonFound);
// pokemonLost.show();
// pokemonFound.show();
pokemonLost.max();
pokemonFound.max();
