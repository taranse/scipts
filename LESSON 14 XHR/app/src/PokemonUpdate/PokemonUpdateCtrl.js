'use strict';

pokemonApp.controller('PokemonUpdateCtrl', function($scope, $routeParams, PokemonsService) {

    $scope.pokemonLoaded = false;

    PokemonsService.getPokemon($routeParams['pokemonId']).then(function(response) {
        $scope.pokemon = response.data;
        $scope.pokemonLoaded = true;
    });

    $scope.updatePokemon = function(pokemonId, wieght, height) {

        $scope.updationError = false;
        $scope.updationSuccess = false;
        PokemonsService.updatePokemon(pokemonId, wieght, height).then(function successCallback(response) {

            // Окей!
            $scope.updationSuccess = true;

        }, function errorCallback(response) {

            // Не окей..
            $scope.updationError = true;
        });

    }

});
