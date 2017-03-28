'use strict';

pokemonApp.controller('EditPokemonCtrl', function($scope, $routeParams) {

    //pr

    $scope.updatePokemon = function() {

        $scope.pokemon.put().then(function(successResult) {
            // Окей!
            $scope.updateSuccess = true;
        }, function(errorResult) {
            // Не окей..
            $scope.updateSuccess = false;
        });

    }

});
