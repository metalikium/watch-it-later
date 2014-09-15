'use strict';

//
// Handles Angular's routing
//
angular.module('omdbService', []).factory('MovieAPI', function($http) {

	return {
		// get all the movies
		get: function(title) {
			return $http.get('http://www.omdbapi.com/?t='+title);
		},
		// save a movie
		save: function(movieApiData) {
			return $http({
				method: 'POST',
				url: '/api/movies',
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(movieApiData)
			});
		},
	}

});