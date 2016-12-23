var pokemonApp = angular.module('PokemonApp', ['ngRoute', 'ngResource']);

angular.
module('PokemonApp')

.config(['$routeProvider',
    function config($routeProvider) {

        $routeProvider.
        when('/pokemons', {
            templateUrl: 'src/PokemonList/PokemonList.html',
            controller: 'PokemonListCtrl'
        }).
        when('/pokemons/:pokemonId', {
            templateUrl: 'src/PokemonDetail/PokemonDetail.html',
            controller: 'PokemonDetailCtrl'
        }).
        when('/edit/:pokemonId', {
            templateUrl: 'src/EditPokemon/EditPokemon.html',
            controller: 'EditPokemonCtrl'
        }).
        when('/create', {
            templateUrl: 'src/CreatePokemon/CreatePokemon.html',
            controller: 'CreatePokemonCtrl'
        }).
        when('/berries', {
            templateUrl: 'src/BerriesList/BerriesList.html',
            controller: 'BerriesListCtrl'
        }).
        when('/berries/:berries', {
            templateUrl: 'src/BerriesDetail/BerriesDetail.html',
            controller: 'BerriesDetailCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
    }
])

.config(['$httpProvider', function($httpProvider) {

}]);
