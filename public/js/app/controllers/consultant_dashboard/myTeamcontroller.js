dsk.controller('myTeam', function ($scope, $http, Data) {

	$scope.message = function(person){
		var data = {
			connection_user: person
		};
		sessionStorage.send_to = angular.toJson(data);
		window.location.href = 'messages';
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