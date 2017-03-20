'use strict';

cgApp.controller('StudioCtrl', function ($scope, videos, $route, $location) {
	$scope.ready = false;
	$scope.content = "";
	$scope.featuredImage = "";
	
	$scope.pageContent = videos.getPage('studio');

	$scope.pageContent.then(function(videos) { 
		console.log($route.current);
		console.log(videos);
		console.log($location.path());
		$scope.content = videos.content;
		$scope.featuredImage = videos.featured_image.guid;
		$scope.ready = true;



	}, function(status) {
		
		console.log(status);
	
	});

});
