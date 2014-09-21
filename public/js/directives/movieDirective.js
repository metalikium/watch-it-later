'use strict';

angular.module('movieDirective', []).directive('rating', function() {

	var directive = {};

	directive.restrict = 'E';

	directive.scope = {
		note: '=note',
		max: '=max'
	};

	directive.templateUrl = '/js/templates/rating.html';

	directive.link = function(scope, element, attr) {

		scope.updateStars = function() {
			var idx = 0;
			scope.stars = [ ];

			for (idx = 0; idx < scope.max; idx += 1) {
				scope.stars.push({
					full: scope.note > idx
				});
			}
		};

		scope.starClass = function(star, idx) {
			var starClass = 'fa-star-o';

			if (star.full) {
				starClass = 'fa-star';
			}

			return starClass;
		};

		scope.setRating = function (idx) {
			scope.note = idx + 1;
		};

		scope.$watch('note', function(newValue, oldValue) {
			if (newValue !== null && newValue !== undefined) {
				scope.updateStars();
			}
		});

	};

	return directive;

});