angular
    .module('PokemonApp')
    .factory('PokemonsService', function($http) {
 			$http.defaults.headers.post = {
				 "application-id": "144AFCCA-CCCE-293C-FF58-3E2620F2FB00",
				 "secret-key": "26D1BEF9-4610-4E94-FF42-1825B2FA0300"
			};
	$http.defaults.headers.put = {
				 "application-id": "144AFCCA-CCCE-293C-FF58-3E2620F2FB00",
				 "secret-key": "26D1BEF9-4610-4E94-FF42-1825B2FA0300"
			};
	$http.defaults.headers.deleate = {
				 "application-id": "144AFCCA-CCCE-293C-FF58-3E2620F2FB00",
				 "secret-key": "26D1BEF9-4610-4E94-FF42-1825B2FA0300"
			}
			 //не может отправить запрос в pokeapi.co/api с этими ключами поэтому создал пост отдельно
            return {

                getPokemons: function() {
                    return $http.get('http://pokeapi.co/api/v2/pokemon/?limit=10');
                },

                getPokemon: function(pokemonId) {
                    return $http.get('http://pokeapi.co/api/v2/pokemon/' + pokemonId);
                },

                createPokemon: function(pokemonData) {
                    return $http({
                        method: 'POST',
                        url: 'https://api.backendless.com/v1/data/pokemon',
                        data: pokemonData
                    });
                },

                deletePokemon: function(pokemonId) {
                    return $http({
                        method: 'DELETE',
                        url: 'https://api.backendless.com/v1/data/pokemon/' + pokemonId,
                    });
                },

                updatePokemon: function(pokemonId, wieght, height) {
                    return $http({
                        method: 'put',
                        url: 'https://api.backendless.com/v1/data/pokemon/' + pokemonId,
                        data: {
							wieght: wieght,
							height: height
						}
                    });
                }
            }
        }
    );
