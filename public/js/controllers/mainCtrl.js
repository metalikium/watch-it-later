'use strict';

//
// Leverage our movieService.js
//
var movieControllers = angular.module('movieControllers', []);

// inject the Movie service into our controller
movieControllers.controller('mainCtrl', function($scope, $http, Movie) {
	// object to hold all the data for the new movie form
	$scope.movieData = {};

	// loading variable to show the spinning loading icon
	$scope.loading = true;

	// select options
	var minYear = 1950;
	var maxYear = new Date().getFullYear();
	var listYears = [];

	for (var i = minYear; i <= maxYear; i++) {
		listYears.push({
			'yearValue': i,
			'yearName': i,
		});
	};

	$scope.years = listYears.reverse();

	// get all the movies first and bind it to the $scope.movies object
	// use the function we created in our service
	// GET ALL MOVIES ====================================================
	Movie.get()
		.success(function(data) {
			$scope.movies = data;
			$scope.loading = false;
		});

	// function to handle submitting the form
	// SAVE A MOVIE ======================================================
	$scope.submitMovie = function() {
		$scope.loading = true;

		// save the movie. pass in movie data from the form
		// use the function we created in our service
		Movie.save($scope.movieData)
			.success(function(data) {
				// redirect to homepage
				window.location = '/';
			})
			.error(function(data) {
				console.log(data);
			});
	};

	// function to handle deleting a movie
	// DELETE A MOVIE ====================================================
	$scope.deleteMovie = function(id) {
		$scope.loading = true; 

		// use the function we created in our service
		Movie.destroy(id)
			.success(function(data) {

				console.log('destroy movie');
				console.log(data);
				
				// if successful, we'll need to refresh the movie list
				Movie.get()
					.success(function(getData) {
						$scope.movies = getData;
						$scope.loading = false;
					});
			});
	};
});



movieControllers.controller('omdbCtrl', function($scope, MovieAPI) {

	$scope.submitMovieApi = function(title) {
		$scope.loading = true;
		$scope.emsg = false;

		MovieAPI.get(title)
			.success(function(data) {
				$scope.movie = data;

				$scope.movieapi = {

				};
				$scope.loading = false;
				console.log('get data');
				console.log($scope.movie);
				if ($scope.movie.Error) {
					$scope.emsg = true;
				}

				MovieAPI.save($scope.movie)
					.success(function(data) {
						console.log('saved');
					})
					.error(function(data) {
						console.log('couldnt save');
						console.log(data);
					});
			})
			.error(function(data) {
				console.log('couldnt get');
				console.log(data);
			});
	};

});
