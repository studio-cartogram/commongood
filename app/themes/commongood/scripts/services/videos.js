'use strict';

angular.module('ngCommongoodApp')
.factory('videos', function ($resource, $q, $timeout) {

	var baseUrl = 'http://vimeo.com/api/v2/';
	var output = '.json';

	return {
		getVideos : function (pageNum) {
		
			var deferred = $q.defer();
			
			
				$resource(baseUrl + 'commongood/videos' + output + '?page=:number').query({number:pageNum},

					function(data) {
				
						deferred.resolve(data);
				
					}, function(response) {
				
						deferred.reject(response);

					}
				);


		
		
		return deferred.promise;

		},

		getVideo : function (Id) {
		
			var deferred = $q.defer();

			
				$resource(baseUrl + 'video/:videoId' + output).query({videoId:Id},

					function(data) {
				
						deferred.resolve(data);
					
					}, function(response) {
				
						deferred.reject(response);

					}
				);

		
		return deferred.promise;

		}

	};			
});
