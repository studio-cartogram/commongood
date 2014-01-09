'use strict';

angular.module('ngCommongoodApp')
.directive('scrollOnClick', function () {
	return {
		restrict: 'A',
		link: function(scope, $elm, attrs) {
			var idToScroll = attrs.href;
			$elm.on('click', function() {
				var $target;
				if (idToScroll) {
					$target = $(idToScroll);
				} else {
					$target = $elm;
				}
				
				$("body, html").animate({scrollTop: 0},  650, 'easeInOutExpo');
				
			});
		}
	}
});