var PokemonList = require('./pokemonList').PokemonList;
var Pokemon = require('./pokemon').Pokemon;
var hide = require('./hidenseek').hide;

// console.log(PokemonList);
var Pickachu = {
    name: 'Pickachu',
    level: 13
}
var Bulbasaur = {
    name: 'Bulbasaur',
    level: 21,
}
var Charmander = {
    name: 'Charmander',
    level: 25,
}
var Meowt = {
    name: 'Meowt',
    level: 13
}

const list = [
    Pickachu,
    Bulbasaur,
    Charmander,
    Meowt
]

const object = list.map(
    obj => new Pokemon(obj.name, obj.level)
);

object.map(i => i.levelUp = 'Charmander');
object.map(i => i.show('Charmander'));
const lost = new PokemonList(...object.slice(0,2));
const found = new PokemonList(...object.slice(2));
found.add('Verona', 41)
found.max();
lost.move('Bulbasaur', found);
found.move('Meowt', lost);
found.showList();
lost.showList();
hide('02', found);
hide('05', lost);