'use strict';

var movieApp = angular.module('movieApp', ['movieControllers', 'movieService', 'omdbService'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('%%');
        $interpolateProvider.endSymbol('%%');
    });