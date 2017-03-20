'use strict';

angular.module('ngCommongoodApp').filter('aspectRatio', function () {
	return function (width) {
		switch(width) {
			case 1280 :
				return "widescreen";
			case 640 :
				return "standard";
		}
	};
});
