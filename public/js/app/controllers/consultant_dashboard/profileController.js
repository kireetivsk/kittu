dsk.controller('profile', function ($scope, $http) {



	/**
	 * Waits for the user to be loaded
	 *
	 * @type {number}
	 */
	var interval = setInterval(function ()
	{
		console.log('tick');
		if ($scope.user !== undefined) {
			window.clearInterval(interval);
			waitForUser();
		}
	}, 100);

	/**
	 * Loads things that need to wait for the user to be loaded.
	 */
	function waitForUser()
	{
		//getFolders();
		dsk.custom.getConsultantProfile($scope, $http);

	}

});