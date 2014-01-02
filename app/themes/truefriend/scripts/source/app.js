
angular.module('cgApp', []).config(function ($routeProvider) {
	$routeProvider
	.when('/', {
		templateUrl: 'views/main.html',
		controller: 'MainCtrl'
	})
	.otherwise({
		redirectTo: '/'
	});
});


/*
App controls all the JS functionality specifically for CommonGood
*/
var CommonGood = {};

/**
 * Module
 *  

var module = (function($) {

	var config = {
		
	};

	function init() {
		
	}

	return { init : init };

})(jQuery);
 
*/

/*
Initialize all functionality for the page after document is ready.
*/
CommonGood.init = function () {
	'use strict';
	console.log('Init has run');
	
};

/*
Entry point into the file.
*/ 
jQuery(document).ready(function($) {
	'use strict';
	CommonGood.init();
});



