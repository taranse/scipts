class PokemonList {
  constructor() {
    this.nameList = list;
  }
  add(newPokemon, level, ability, fraction){
    this.nameList[newPokemon.name] = newPokemon;
    this.nameList[newPokemon.name].level = level;
    this.nameList[newPokemon.name].ability = {};
    this.nameList[newPokemon.name].ability.strenght = ability[0];
    this.nameList[newPokemon.name].ability.agility = ability[1];
    this.nameList[newPokemon.name].ability.intelligence = ability[2];
    this.nameList[newPokemon.name].fraction = fraction;
  }
  showFraction(fraction){
    var mass = [];
    for(let names in this.nameList){
      if(this.nameList[names].fraction == fraction)
        mass.push(this.nameList[names].name)
    }
    console.log(`Покемоны из фракции ${fraction} - ${mass}`);
  }
}

class Pokemon extends PokemonList{
  constructor(nameList, name){
    super(nameList);
    this.name = nameList.name;
    this.level = nameList.level;
    this.fraction = nameList.fraction;
    this.ability = [
      nameList.ability.strenght, 
      nameList.ability.agility, 
      nameList.ability.intelligence
    ];
  }
  show(){
    console.log(`
      Покемон: ${this.name}, 
      Уровень: ${this.level}, 
      Характеристики: ${this.ability},
      Фракция: ${this.fraction}
    `);
  }
  set levelUp(level){
    this.level += 1;
  }
}

var Pickachu = {
  name: 'Pickachu',
  level : 13,
  ability : {
    strenght : 15,
    agility : 18,
    intelligence : 22
  },
  fraction : 'fire'
}
var Bulbasaur = {
  name: 'Bulbasaur',
  level : 21,
  ability : {
    strenght : 16,
    agility : 25,
    intelligence : 11
  },
  fraction : 'water'
}
let list = {Pickachu, Bulbasaur}
var pokemonList = new PokemonList(list);
var Charmander = {name: 'Charmander'};
pokemonList.add(Charmander, 14, [21, 17,76], 'fire');
var pokemon = new Pokemon(Charmander);
pokemon.levelUp = true;
pokemon.show('Charmander');
pokemonList.showFraction('fire');