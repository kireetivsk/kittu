//'use strict';
// Your app's root module...
var dsk = angular.module('dsk', ['ngSanitize'], function($httpProvider)
{
    /**
     * The following code is to endure that Angular ajax works like jquery ajax by sending a properly formatted POST to the ajax php files
     */
        // Use x-www-form-urlencoded Content-Type
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

    // Override $http service's default transformRequest
    $httpProvider.defaults.transformRequest = [function(data)
    {
        /**
         * The workhorse; converts an object to x-www-form-urlencoded serialization.
         * @param {Object} obj
         * @return {String}
         */
        var param = function(obj)
        {
            var query = '';
            var name, value, fullSubName, subName, subValue, innerObj, i;

            for(name in obj)
            {
                value = obj[name];

                if(value instanceof Array)
                {
                    for(i=0; i<value.length; ++i)
                    {
                        subValue = value[i];
                        fullSubName = name + '[' + i + ']';
                        innerObj = {};
                        innerObj[fullSubName] = subValue;
                        query += param(innerObj) + '&';
                    }
                }
                else if(value instanceof Object)
                {
                    for(subName in value)
                    {
                        subValue = value[subName];
                        fullSubName = name + '[' + subName + ']';
                        innerObj = {};
                        innerObj[fullSubName] = subValue;
                        query += param(innerObj) + '&';
                    }
                }
                else if(value !== undefined && value !== null)
                {
                    query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
                }
            }

            return query.length ? query.substr(0, query.length - 1) : query;
        };

        return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
    }];

});

dsk.factory('Data', function ($http) {
	return {
		getUser: {
			ajax:
				function() {
					var ajax_url = "/publicapi/get-session-data";
					return $http.post(ajax_url)
				},
			lock: false
		}
	}
});

dsk.factory('Uploader', function($q, $rootScope) {
	this.upload = function(url, file, other_data) {
		var deferred = $q.defer(),
			formdata = new FormData(),
			xhr = new XMLHttpRequest();

		formdata.append('photo', file);
		//formdata.append('user', other_data);

		xhr.onreadystatechange = function(r) {
			if (4 === this.readyState) {
				if (xhr.status == 200) {
					$rootScope.$apply(function() {
						deferred.resolve(xhr);
					});
				} else {
					$rootScope.$apply(function() {
						deferred.reject(xhr);
					});
				}
			}
		}
		xhr.open("POST", url, true);
		xhr.send(formdata);
		return deferred.promise;
	};
	return this;
})

dsk.directive('fileChange', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			element.bind('change', function() {
				scope.$apply(function() {
					if(element[0].files)
						scope[attrs['fileChange']](element[0].files);
					else
						scope[attrs['fileChange']](element);
				})
			})
		},
	}
})

//reusable function for the app
dsk.custom = {
	getTeam : function ($scope, $http)
	{
		var ajax_url = "/consultantapi/get-team";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					$scope.sponsor = data.results.sponsor;
					$scope.upline = data.results.upline;
					$scope.downline = data.results.downline;
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.$parent.connection_requests[index].alert = {message: message, type: "alert-danger"};
				}
			})
	},

	getFolders : function ($scope, $http)
	{
		var ajax_url = "/consultantapi/get-folders";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					$scope.folders = data.results;
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "alert-danger"};
				}
			})
	},

	getMessages : function ($scope, $http)
	{
		var ajax_url = "/consultantapi/get-messages";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					$scope.messages = data.results;
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "alert-danger"};
				}
			})
	},

	getConnectionRequests : function ($scope, $http)
	{
		var ajax_url = "/consultantapi/get-connection-requests";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				$scope.connection_requests = data.results;
			})
	},

	getRejectedConnectionRequests: function ($scope, $http)
	{
		var ajax_url = "/consultantapi/get-rejected-connection-requests";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				$scope.rejected_connection_requests = data.results;
			})
	},

	getConsultantProfile: function ($scope, $http)
	{
		var ajax_url = "/consultantapi/get-consultant-profile";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				$scope.consultant_profile = data.results;
				if (data.results.profile.social !== undefined)
					$scope.connection_profile.profile.socials = angular.fromJson(data.results.profile.social);
			})
	},

	companySearch: function($scope, $http) {
		$scope.company_names = null;
		if ($scope.registration_company.length > 3) {
			var ajax_url = "/publicapi/company-search";
			var form_data = {
				company_name: $scope.registration_company
			};
			$http.post(ajax_url, form_data)
				.success(function (data) {
					//successful
					if (data.code == 200)
						$scope.company_names = data.results;
					else
						$scope.registration_company_id = undefined;
				})
		}
	},

	setCompanySelection: function($scope, company){
		$scope.registration_company_id = company.id;
		$scope.registration_company = company.name;
		$scope.company_names = null;
	},

	getDiscussionMeta: function($scope, $http){
		var ajax_url = "/consultantapi/get-discussion-meta";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				if (data.code == 200)
					$scope.meta = data.results;
				})

	},

	getDiscussionMyCategories: function($scope, $http){
		var ajax_url = "/consultantapi/get-discussion-my-categories";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				if (data.code == 200)
					$scope.my_categories = data.results;
			})

	},

	getDiscussions: function($scope, $http){
		var ajax_url = "/consultantapi/get-discussions";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				if (data.code == 200)
					$scope.view_categories = data.results;
			})

	},

};

