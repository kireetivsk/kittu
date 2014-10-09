dsk.controller('main', function ($scope, $http, Data) {

	/**
	 * Clear all notifications
	 */
	$scope.clearAllNotifications = function(){
		var ajax_url = "/consultantapi/clear-notifications";
		var form_data = {
			notifications: $scope.notifications.notifications
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				$scope.notifications = undefined;
			})

	};

	/**
	 * Clear one notification
	 *
	 * @param notification
	 * @param index
	 */
	$scope.clearNotification = function(notification, index)
	{
		var ajax_url = "/consultantapi/clear-notification";
		var form_data = {
			notification: notification.id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				$scope.notifications.notifications.splice(index,1);
				$scope.notifications.count--;
			})

	}

	/**
	 * Get all notifications
	 */
	var getNotifications = function(){
		var ajax_url = "/consultantapi/get-notifications";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				$scope.notifications = data.results;
			})
	};

	$scope.isActive = function (viewLocation)
	{
		return viewLocation === window.location.pathname;
	};

	getNotifications();

	if (Data.getUser.lock !== true) {
		Data.getUser.lock = true;
		Data.getUser.ajax().success(function (result) {
			$scope.user = result.results;
			Data.getUser.lock = false;
		}).error(function(){
			Data.getUser.lock = false;
		})
	}
});