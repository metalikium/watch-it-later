'use strict';

var movieApp = angular.module('movieApp', ['movieControllers', 'movieService', 'omdbService', 'ui.bootstrap'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('%%');
        $interpolateProvider.endSymbol('%%');
    });