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

}).run(['$rootScope', '$state', '$stateParams',	function ($rootScope, $state, $stateParams) {
	// It's very handy to add references to $state and $stateParams to the $rootScope
	// so that you can access them from any scope within your applications.For example,
	// <li ng-class="{ active: $state.includes('contacts.list') }"> will set the <li>
	// to active whenever 'contacts.list' or one of its decendents is active.
	$rootScope.$state = $state;
	$rootScope.$stateParams = $stateParams;
}]);



