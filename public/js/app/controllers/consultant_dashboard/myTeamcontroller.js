dsk.controller('myTeam', function ($scope, $http, Data) {

	$scope.message = function(person){
		var data = {
			connection_user: person
		};
		sessionStorage.send_to = angular.toJson(data);
		window.location.href = 'messages';
	};

	$scope.blockUser = function(person)
	{
		var ajax_url = "/consultantapi/block-user";
		var form_data = {
			person: person
		};
		$http.post(ajax_url, form_data)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					waitForUser();
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
				} else { //failed
					message = data.error === undefined ? "Unknown error." : data.error.message
					$scope.alerts = {message: message, type: "alert-danger"};

				}
			})
			.error(function (data)
			{
				message = data.error === undefined ? "Unknown error." : data.error.message
				$scope.alerts = {message: message, type: "alert-danger"};
			})

	};

	$scope.unblockUser = function(person)
	{
		var ajax_url = "/consultantapi/unblock-user";
		var form_data = {
			person: person
		};
		$http.post(ajax_url, form_data)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					waitForUser();
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
				} else { //failed
					message = data.error === undefined ? "Unknown error." : data.error.message
					$scope.alerts = {message: message, type: "alert-danger"};

				}
			})
			.error(function (data)
			{
				message = data.error === undefined ? "Unknown error." : data.error.message
				$scope.alerts = {message: message, type: "alert-danger"};
			})

	};

	$scope.isBlocked = function(person)
	{
		if(person.meta_connection_status.id == 4)
			return true;
		else
			return false;
	};

	var interval = setInterval(function ()
	{
		if ($scope.user !== undefined) {
			window.clearInterval(interval);
			waitForUser();
		}
	}, 100);

	function waitForUser()
	{
		dsk.custom.getTeam($scope, $http);
	}

});