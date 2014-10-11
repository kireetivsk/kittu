dsk.controller('connectionRequest', function ($scope, $http, Data) {

	$scope.acceptRequest = function (request_id, index) {
		var ajax_url = "/consultantapi/accept-request";
		var form_data = {
			request_id: request_id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
					$scope.connection_requests.splice(index, 1);
				else { //failed
					message = data.message === undefined ? "Unknown error." : data.message
					$scope.connection_requests[index].alert = {message: message, type: "alert-danger"};
				}
			})

	}

	$scope.acceptReject = function (request_id, index) {
		var ajax_url = "/consultantapi/accept-request";
		var form_data = {
			request_id: request_id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
					$scope.rejected_connection_requests.splice(index, 1);
				else { //failed
					message = data.message === undefined ? "Unknown error." : data.message
					$scope.connection_requests[index].alert = {message: message, type: "alert-danger"};
				}
			})

	}

	$scope.rejectRequest = function (request_id, index) {
		var ajax_url = "/consultantapi/reject-request";
		var form_data = {
			request_id: request_id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
					$scope.connection_requests.splice(index, 1);
				else { //failed
					message = data.message === undefined ? "Unknown error." : data.message
					$scope.connection_requests[index].alert = {message: message, type: "alert-danger"};
				}
			})

	}

	var getConnectionRequests = function () {
		var ajax_url = "/consultantapi/get-connection-requests";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				$scope.connection_requests = data.results;
			})

	}

	var getRejectedConnectionRequests = function () {
		var ajax_url = "/consultantapi/get-rejected-connection-requests";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				$scope.rejected_connection_requests = data.results;
			})

	}

	var interval = setInterval(function ()
	{
		if ($scope.user !== undefined) {
			window.clearInterval(interval);
			waitForUser();
		}
	}, 100);

	function waitForUser()
	{
		getConnectionRequests();
		getRejectedConnectionRequests();

	}

});