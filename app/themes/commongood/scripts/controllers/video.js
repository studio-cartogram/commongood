'use strict';

angular.module('ngCommongoodApp')
.controller('VideoCtrl', function ($scope, $route, player) {
	/*
	*	Set the videos on our scope to be the resolve promise from our route.
	*/
	$scope.video = $route.current.locals.video;

	/*
	*	Add the video url to the scope
	*/
	$scope.player = player($scope.video.post_meta.vimeo_id);


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
