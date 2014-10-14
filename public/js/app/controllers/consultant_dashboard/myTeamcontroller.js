dsk.controller('myTeam', function ($scope, $http, Data) {

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