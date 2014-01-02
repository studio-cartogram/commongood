'use strict';

angular.module('ngCommongoodApp')
.directive('vimeoVideo', function ($compile) {
	return {
		restrict: 'E',
		replace : true,
		templateUrl : '/app/themes/commongood/views/directive-vimeo-video.html',
		scrope : {
			video: "@"
		}
	};
});
