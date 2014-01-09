'use strict';

angular.module('ngCommongoodApp')
.factory('player', function ($sanitize, $sce) {
	return {
		getUrl : function (videoId) {
			return	$sce.trustAsResourceUrl( 'http://player.vimeo.com/video/' + videoId + '?autoplay=1&autopause=1&title=0&byline=0&badge=0&portrait=0');
		}
	};			
});
