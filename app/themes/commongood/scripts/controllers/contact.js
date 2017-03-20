'use strict';

cgApp.controller('ContactCtrl', function ($scope, videos, $route, $location) {
	$scope.ready = false;
	
	$scope.pageContent = videos.getPage('contact');

	$scope.pageContent.then(function(videos) { 
		console.log(videos);
		$scope.ready = true;



	}, function(status) {
		
		console.log(status);
	
	});

});
