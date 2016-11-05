class PokemonList extends Array{
  constructor(...list) {
    super(array);
    for (var name in list){
      this[name] = list[name];
    }
  }
  add(...list) {
    this.push({name:list[0],level:list[1],ability:list[2],fraction:list[3]})
  }
  showList(){
    let mass = [];
    for(var name in this)
      mass.push(`\n${this[name].name} - ${this[name].level}. ${this[name].fraction}`);
    console.log(`${mass}`)
  }
  // showFraction(fraction) {
  //   let mass = [];
  //   for (let names in this.nameList) {
  //     if (this.nameList[names].fraction == fraction)
  //       mass.push(this.nameList[names].name)
  //   }
  //   console.log(`Покемоны из фракции ${fraction} - ${mass}`);
  // }
}

class Pokemon {
  constructor(name) {
    this.name = name.name;
    this.level = name.level;
    this.fraction = name.fraction;
    this.ability = [
      name.ability.strenght, 
      name.ability.agility, 
      name.ability.intelligence
    ];
  }
  show() {
    console.log(`
      Покемон: ${this.name}, 
      Уровень: ${this.level}, 
      Характеристики: ${this.ability},
      Фракция: ${this.fraction}
    `);
  }
  set levelUp(level) {
    this.level += 1;
  }
}
var Pickachu = {
  name: 'Pickachu',
  level: 13,
  ability: {
    strenght: 15,
    agility: 18,
    intelligence: 22
  },
  fraction: 'fire'
}
var Bulbasaur = {
  name: 'Bulbasaur',
  level: 21,
  ability: {
    strenght: 16,
    agility: 25,
    intelligence: 11
  },
  fraction: 'water'
}
let list = {
  Pickachu,
  Bulbasaur
}
var array = new Array();
var pokemonList = new PokemonList(Pickachu, Bulbasaur);
pokemonList.add('Charmander', 14, [21, 17, 76], 'fire');
pokemonList.showList();
// var pokemon = new Pokemon(Charmander);
// pokemon.levelUp = true;
// pokemon.show('Charmander');
// pokemonList.showFraction('fire');
