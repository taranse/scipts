var PokemonList = require('./pokemonList').PokemonList;
var Pokemon = require('./pokemon').Pokemon;
var hide = require('./hidenseek').hide;
var seek = require('./hidenseek').seek;

var Pickachu = {name: 'Pickachu',level: 13};
var Bulbasaur = {name: 'Bulbasaur',level: 21};
var Charmander = {name: 'Charmander', level: 25};
var Meowt = {name: 'Meowt',level: 13};

const list = [Pickachu, Bulbasaur, Charmander, Meowt];

const object = list.map(
    obj => new Pokemon(obj.name, obj.level)
);
object[2].levelUp = 33;
// object[3].show();
const lost = new PokemonList(...object.slice(0,2));
const found = new PokemonList(...object.slice(2));
found.add('Verona', 41);
// found.max();
lost.move('Bulbasaur', found);
found.move('Meowt', lost);
// found.showList();
// lost.showList();

// hide('02', PokemonList);
// hide('05', PokemonList);
// seek('',lost);

if(process.argv[2]){
    if(process.argv[3]){
        if(process.argv[4]) eval(`${process.argv[2]}('${process.argv[3]}','${process.argv[4]}')`);
        else eval(`${process.argv[2]}('${process.argv[3]}')`);
    }else eval(`${process.argv[2]}()`);
}
