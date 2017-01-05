'use strict';

pokemonApp.component('pokemonList', {

    controller: function PokemonListCtrl(PokemonsService) {

        this.pokemons = PokemonsService.query();
		this.navigateTo = function(to){
			window.location = '#!/pokemons/' + to;
		};
    },

    templateUrl: './src/PokemonList/PokemonList.html'

});
