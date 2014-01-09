'use strict';

var cgApp = angular.module('ngCommongoodApp', [
	'ngCookies',
	'ngResource',
	'ngSanitize',
	'ngRoute',
	'ngAnimate'
	])
.config(function ($routeProvider, $locationProvider) {
	$routeProvider
	.when('/', {
		templateUrl: '/app/themes/commongood/views/main.html',
		controller: 'MainCtrl',
		reloadOnSearch: false
		}
	)
	.when('/video/:videoId', {
		templateUrl: '/app/themes/commongood/views/main.html',
		controller: 'MainCtrl'
		}
	)
	.when('/studio', {
		templateUrl: '/app/themes/commongood/views/studio.html'
		}
	)
	.when('/contact', {
		templateUrl: '/app/themes/commongood/views/contact.html'
		}
	)
	// .when('/video/:videoId', {
	// 	templateUrl: '/app/themes/commongood/views/video.html',
	// 	controller: 'VideoCtrl',
	// 	resolve: {
	// 		video : function($q, $route, videos) {
	// 			var deferred = $q.defer();
				
	// 			videos.getVideo($route.current.pathParams.videoId)
	// 				.then(function(video) { deferred.resolve(video); });

	// 			return deferred.promise;
	// 			}
	// 		}
	// 	}
	// )

	// .when('/page/:number', {
	// 	templateUrl: 'views/main.html',
	// 	controller: 'MainCtrl'
	// })
	.otherwise({
		redirectTo: '/'
	});
	
	$locationProvider.html5Mode(true)

});