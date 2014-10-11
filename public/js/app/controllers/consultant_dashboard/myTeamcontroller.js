dsk.controller('myTeam', function ($scope, $http, Data) {

	var getTeam = function()
	{
		var ajax_url = "/consultantapi/get-team";
		$http.post(ajax_url)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					$scope.sponsor 	= data.results.sponsor;
					$scope.upline 	= data.results.upline;
					$scope.downline = data.results.downline;
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.connection_requests[index].alert = {message: message, type: "alert-danger"};
				}
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
		getTeam();

	}

});