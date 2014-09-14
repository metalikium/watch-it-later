'use strict';

//
// Leverage our movieService.js
//
angular.module('mainCtrl', [])
	// inject the Movie service into our controller
	.controller('mainController', function($scope, $http, Movie) {
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

		$scope.years = listYears;

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

					// if successful, we'll need to refresh the movie list
					Movie.get()
						.success(function(getData) {
							$scope.movies = getData;
							$scope.loading = false;
						});

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

					// if successful, we'll need to refresh the movie list
					Movie.get()
						.success(function(getData) {
							$scope.movies = getData;
							$scope.loading = false;
						});
				});
		};
});
	