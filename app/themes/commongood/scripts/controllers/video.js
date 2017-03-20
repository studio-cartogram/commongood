'use strict';

angular.module('ngCommongoodApp')
.controller('VideoCtrl', function ($scope, videos, $stateParams, player) {
	/*
	*	Set the videos on our scope to be the resolve promise from our route.
	*/
	$scope.playing = videos.getVideo($stateParams.videoId);
	
	console.log($stateParams.videoId);

	/*
	*	Add the video url to the scope
	*/
	//$scope.player = player.getUrl($route.current.locals.video.post_meta.vimeo_id[0]);


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

});
