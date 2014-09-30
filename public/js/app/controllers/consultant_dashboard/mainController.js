dsk.controller('main', function ($scope, $http) {

	$scope.clearAllNotifications = function(){
		var ajax_url = "/ajax/clear-notifications";
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
		var ajax_url = "/ajax/clear-notification";
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
		var ajax_url = "/ajax/get-notifications";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				$scope.notifications = data;
			})

	};


	getNotifications();
});