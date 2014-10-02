dsk.controller('main', function ($scope, $http) {

	$scope.clearAllNotifications = function(){
		var ajax_url = "/consultantapi/clear-notifications";
		var form_data = {
			notifications: angular.toJson($scope.notifications.notifications)
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				$scope.notifications = undefined;
			})

	};

	$scope.clearNotification = function(notification, index)
	{
		var ajax_url = "/consultantapi/clear-notification";
		var form_data = {
			notification: angular.toJson(notification)
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				$scope.notifications.notifications.splice(index,1);
				$scope.notifications.count--;
			})

	}

	var getNotifications = function(){
		var ajax_url = "/consultantapi/get-notifications";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				$scope.notifications = data.results;
			})

	};

    getUser = function(){
        var ajax_url = "/consultantapi/get-session-data";
        $http.post(ajax_url)
            .success(function (data) {
                //successful
                if (data.code == 200)
                    $scope.user = data.results;
            })
    };

    getUser();
	getNotifications();
});