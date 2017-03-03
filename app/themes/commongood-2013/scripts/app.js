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
		templateUrl: '/app/themes/commongood/views/studio.html',
		controller: 'StudioCtrl'
		}
	)
	.when('/contact', {
		templateUrl: '/app/themes/commongood/views/contact.html',
		controller: 'ContactCtrl'
		}
	)
	.otherwise({
		redirectTo: '/'
	});
	
	$locationProvider.html5Mode(true)

});