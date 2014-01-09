'use strict';

cgApp.controller('MainCtrl', function ($scope, videos, player, $routeParams, $route) {
	$scope.videos = [];
	$scope.vids = [];
	$scope.ready = false;

	$scope.playVideo = function(video) {
		var id = video.ID;
		$scope.playing = video;
		$scope.player = player.getUrl(video.post_meta.vimeo_id);
	};
			
	
	
	//	$anchorScroll();


	// 	$state.go('video', {videoId : video.Id});
	// 	
	// 	
	// 	
	// 	
	// };
	// $rootScope.$on('$stateChangeStart', function(event, toState){ 
	// 	// var greeting = toState.data.videoId + " " + toState.data.videoId;
	// 	// console.log(greeting);


	//     // Would print "Hello World!" when 'parent' is activated
	//     // Would print "Hello UI-Router!" when 'parent.child' is activated
	
	
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
	//var videosCollection = videos.getVideos();

	$scope.videosCollection = videos.getVideos();

	$scope.videosCollection.then(function(videos) { 
		
		if ($routeParams.v) {
			$scope.playVideo(videos[$routeParams.v]);
		} else {
			$scope.playVideo(videos[0]);
		}
		$scope.ready = true;
		

		videos.forEach(function(video) {
			$scope.videos.push(video);
			$scope.vids.push(video.ID);
		});


	}, function(status) {
		
		console.log(status);
	
	});

	

	//var videosCollection = $route.current.locals.videos;
	/*
	*	Iterate over the collection, pushing each item to the scope.
	*/
		
	

	

	
	
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
