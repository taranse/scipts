'use strict';

pokemonApp.controller('BerriesDetailCtrl', function($scope, $routeParams, BerriesService) {

    $scope.pokemonLoaded = false;

    $scope.berrie = BerriesService.get({
        berrieId: $routeParams['berries']
    }, function(successResult) {
        // Окей!
        console.log(successResult);
        $scope.notfoundError = false;
        $scope.berriesLoaded = true;
    }, function(errorResult) {
        // Не окей..
        $scope.notfoundError = true;
        $scope.berriesLoaded = false;
    });

});
