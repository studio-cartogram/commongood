'use strict';

cgApp.controller('MainCtrl', function ($scope, videos, $route,  player) {
	$scope.videos = [];
	
	/*
	*	TODO:
	*	logic for handling page numbers, not sure how to handle this yet.
	*/
	//$scope.page = $route.current.params.number;

	// if(!$scope.page) {
	// 	$scope.page = 1;
	// }
	
	/*
	*	Set the video Collection to be the resolve promise from our route.
	*/
	var videosCollection = $route.current.locals.videos;
	/*
	*	Iterate over the collection, pushing each item to the scope.
	*/
	videosCollection.forEach(function(videos) {
		$scope.videos.push(videos);
	});

	$scope.active = $scope.videos[0];
	/*
	*	Add the video url to the scope
	*/
	$scope.player = player($scope.active.post_meta.vimeo_id);


	// console.log($scope.videos.length);
	
	/*
	*	TODO:
	*	logic for handling page numbers, not sure how to handle this yet.
	*/

	// $scope.moreVideos = function() {
	// 	console.log($scope.page);
	// 	$scope.page++;
	// 	$location.url('page/' + $scope.page)

	// }
	// $scope.prevPage = function() {
	// 	console.log($scope.page);
	// 	$scope.page--;
	// 	$location.url('page/' + $scope.page)
	// }

	
});
