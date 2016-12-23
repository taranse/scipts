'use strict';

pokemonApp.controller('BerriesListCtrl', function($scope, BerriesService) {

    var promise = BerriesService.query().$promise;
	promise.then(function(resourse){
		$scope.berries = resourse;
		console.log($scope);
	});
});
