'use strict';

angular.module('ngCommongoodApp')
.directive('vimeoVideo', function () {
	return {
		restrict: 'E',
		replace : true,
		templateUrl : '/app/themes/commongood/views/directive-vimeo-video.html',
		// scope : {
		// 	playing: "=playing",
		// 	player: '=player'
		// }
	};
});
