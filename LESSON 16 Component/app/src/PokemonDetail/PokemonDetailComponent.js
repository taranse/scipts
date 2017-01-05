'use strict';

pokemonApp.component('pokemonDetail', {

    controller: function PokemonDetailCtrl($routeParams, PokemonsService) {
		
		this.pokemonLoaded = false;
		var th = this;
		this.pokemon = PokemonsService.get({
			pokemonId: $routeParams['pokemonId']
		}, function(successResult) {
			// Окей!
			th.notfoundError = false;
			th.pokemonLoaded = true;
			th.activeTab = 1;
			th.disableControlTab = true;
		}, function(errorResult) {
			// Не окей..
			th.notfoundError = true;
			th.pokemonLoaded = true;
		});
		this.pokemon.$promise.then(function(result) {
//			$scope.pokemonLoaded = true;
		});
		this.deletePokemon = function(pokemonId) {
			th.pokemon.$delete({
				pokemonId: pokemonId
			}, function(successResult) {
				// Окей!
				th.deletionSuccess = true;
			}, function(errorResult) {
				// Не окей..
				th.deletionError = true;
			});
		}
    },

    templateUrl: './src/PokemonDetail/PokemonDetail.html'

});
