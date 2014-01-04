'use strict';

angular.module('ngCommongoodApp')
.factory('videos', function ($resource, $q, $timeout) {

	var baseUrl = '/wp-json.php/posts';

	return {
		getVideos : function (pageNum) {
		
			var deferred = $q.defer();
			
			
				$resource(baseUrl + '?type=works').query(

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

			
				$resource(baseUrl + '/:videoId').get({videoId:Id},

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
