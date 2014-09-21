'use strict';

var movieApp = angular.module('movieApp', 
  [
    'movieControllers',
    'movieService',
    'omdbService',
    //'ui.bootstrap',
    'movieDirective'
  ],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('%%');
        $interpolateProvider.endSymbol('%%');
    }
);