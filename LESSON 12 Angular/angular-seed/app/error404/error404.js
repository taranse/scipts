'use strict';

angular.module('myApp.error404', ['ngRoute'])
	.config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/404', {
            templateUrl: 'error404/404.html',
            controller: 'error404Ctrl'
        });
    }])
	 .controller('error404Ctrl', function ($scope) {
		$scope.title = '404 not found';
	})