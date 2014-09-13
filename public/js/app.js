'use strict';

var movieApp = angular.module('movieApp', ['mainCtrl', 'movieService'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('%%');
        $interpolateProvider.endSymbol('%%');
    });