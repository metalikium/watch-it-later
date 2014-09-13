'use strict';

//
// Handles Angular's routing
//
angular.module('movieService', []).factory('Movie', function($http) {

	return {
		// get all the movies
		get: function() {
			return $http.get('/api/movies');
		},

		// save a movie
		save: function(movieData) {
			return $http({
				method: 'POST',
				url: '/api/movies',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(movieData)
			});
		},

		// destroy a movie
		destroy: function(id) {
			return $http.delete('/api/movies/' + id);
		}
	}

});