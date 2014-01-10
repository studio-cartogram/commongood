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
					$target = $(idToScroll).offset().top;
				} else {
					$target = 0;
				}
				$("body, html").animate({scrollTop: $target}, 450, 'easeInOutExpo');
			});
		}
	}
});