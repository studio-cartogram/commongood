'use strict';

var cgApp = angular.module('ngCommongoodApp', [
	'ngCookies',
	'ngResource',
	'ngSanitize',
	'ngRoute',
	'ngAnimate',
	'ui.router'
	])
.config(function ($stateProvider, $locationProvider) {
	var videos = {
			name: 'videos',
			url: '/',
			templateUrl: '/app/themes/commongood/views/videos.html',
			controller: 'MainCtrl'
		},
		video = {
			name: 'video',
			url: 'video/:videoId',
			parent: videos,
			data:{
				// customData1 inherited from 'parent'
		         // but we'll overwrite customData2
		         customData2:  "UI-Router!"
		     }
		 },
		 contact = {
		 	name: 'contact',
			url: '/contact',
			templateUrl: '/app/themes/commongood/views/contact.html'

		 },
		 studio = {
		 	name: 'studio',
			url: '/studio',
			templateUrl: '/app/themes/commongood/views/studio.html'

		 }

	 $stateProvider.state(videos);
	 $stateProvider.state(video);
	 $stateProvider.state(contact);
	  $stateProvider.state(studio);


	// $routeProvider
	// .when('/', {
	// 	templateUrl: '/app/themes/commongood/views/main.html',
	// 	controller: 'MainCtrl',
	// 	resolve: {
	// 		videos : function($q, $route, videos) {
	// 			var deferred = $q.defer();
	// 			videos.getVideos()
	// 				.then(function(videos) { deferred.resolve(videos); });

	// 			return deferred.promise;
	// 			}
	// 		}
	// 	}
	// )
	// .when('/page/:pageNum', {
	// 	templateUrl: '/app/themes/commongood/views/main.html',
	// 	controller: 'MainCtrl',
	// 	resolve: {
	// 		videos : function($q, $route, videos) {
	// 			var deferred = $q.defer();

	// 			videos.getVideos($route.current.pathParams.pageNum)
	// 				.then(function(videos) { deferred.resolve(videos); });

	// 			return deferred.promise;
	// 			}
	// 		}
	// 	}
	// )
	//.when('/video/:videoId', {
	//	templateUrl: '/app/themes/commongood/views/video.html',
	//	controller: 'VideoCtrl',
		// resolve: {
		// 	video : function($q, $route, videos) {
		// 		var deferred = $q.defer();

		// 		videos.getVideo($route.current.pathParams.videoId)
		// 			.then(function(video) { deferred.resolve(video); });

		// 		return deferred.promise;
		// 		}
		// 	}
		// }
	//)

	// .when('/page/:number', {
	// 	templateUrl: 'views/main.html',
	// 	controller: 'MainCtrl'
	// })
	// .otherwise({
	// 	redirectTo: '/'
	// });

$locationProvider.html5Mode(true)

});
// .run(['$state', function ($state) {

// 	$state.transitionTo('videos'); 
// }]);



