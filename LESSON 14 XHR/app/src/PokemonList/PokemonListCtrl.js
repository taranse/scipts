'use strict';

pokemonApp.controller('PokemonListCtrl', function($scope, PokemonsService, BerriesService, $q, $timeout) {

//     PokemonsService.getPokemons().then(function(response) {
//         $scope.pokemons = response.data.results;
//     });
//    
//     BerriesService.getBerries().then(function(response) {
//         $scope.berries = response.data.results;
//     });
	$scope.isGet = false;
	$q.all([PokemonsService.getPokemons(), BerriesService.getBerries()])
		.then(function(response) {
			$scope.pokemons = response[0].data.results;
			$scope.berries = response[1].data.results;
			$timeout(function(){ $scope.isGet = true }, 1000) //ПОдождет пока закгрузятся оба списка и выведет их через секунду
    });
});
