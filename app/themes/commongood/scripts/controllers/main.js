'use strict';

cgApp.controller('MainCtrl', function ($scope, videos, player, $stateParams, $state, $rootScope) {
	$scope.videos = [];
	$scope.vids = [];
	
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
	var videosCollection = videos.getVideos();
	/*
	*	Iterate over the collection, pushing each item to the scope.
	*/
	videosCollection.then(function(response){
		
		response.forEach(function(videos) {
			$scope.videos.push(videos);
			$scope.vids.push(videos.ID);
		});
		$scope.playing = $scope.videos[0];
		$scope.player = player.getUrl($scope.playing.post_meta.vimeo_id);

		var where = $scope.vids.indexOf(18);
		console.log(where);

	});

	console.log($state.current);


	$scope.playVideo = function(video) {
		$scope.playing = video;
		$scope.player = player.getUrl(video.post_meta.vimeo_id);
		$state.go('video', {videoId : video.Id});
	};
	$rootScope.$on('$stateChangeStart', function(event, toState){ 
		// var greeting = toState.data.videoId + " " + toState.data.videoId;
		// console.log(greeting);
		

	    // Would print "Hello World!" when 'parent' is activated
	    // Would print "Hello UI-Router!" when 'parent.child' is activated
	})
	/*
	*	Add the video url to the scope
	*/
	


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
