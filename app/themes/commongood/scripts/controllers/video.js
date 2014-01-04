'use strict';

angular.module('ngCommongoodApp')
.controller('VideoCtrl', function ($scope, videos, $route, $routeParams, $sanitize, $sce) {
	$scope.video = $route.current.locals.video;

	console.log($route.current.locals.video);

	/*
	*	Set the video Collection to be the resolve promise from our route.
	*/
	// var videosCollection = '';


	/*
	*	Iterate over the collection, pushing each item to the scope.
	*/
	// videosCollection.forEach(function(video) {
	// 	$scope.videos.push(video);
	// });

	

	/*
	*	Function to return our safe video url
	*/
	var playerUrl = function(videoId) {
		return	$sce.trustAsResourceUrl( 'http://player.vimeo.com/video/' + videoId + '?autoplay=1&autopause=1&title=0&byline=0&badge=0&portrait=0');;
	}

	/*
	*	Add the video url to the scope
	*/
	$scope.playerUrl = playerUrl($scope.video.post_meta.vimeo_id);
});
