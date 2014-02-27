'use strict';


angular.module('ngCommongoodApp').factory('videos', function ($resource, $q, $cacheFactory) {

	var baseUrl = '/wp-json.php/',
		cache = $cacheFactory('videos'),
		requestType;
	
	return {
		getVideos : function () {
		
			var deferred = $q.defer(),
				cachedVideos = cache.get('videos'),
				requestType = "posts";
				
				if (!cachedVideos) {
				
					$resource(baseUrl + requestType + '?type=works').query(

						function(data) {
					
							deferred.resolve(data);
					
						}, function(response) {
					
							deferred.reject(response);

						}
					);

					cachedVideos = deferred.promise;

					cache.put('videos', cachedVideos);

				}
		
		return cachedVideos;

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

		},
		getPage : function (slug) {
		
			var deferred = $q.defer(),
				requestType = "pages";

			
				$resource(baseUrl + requestType +'/:slug').get({slug:slug},

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
