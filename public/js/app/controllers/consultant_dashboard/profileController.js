dsk.controller('profile', function ($scope, $http, Uploader) {

	$scope.alert = {};

	$scope.upload = function(files) {
		var ajax_url = "/consultantapi/upload-photo";
		var r = Uploader.upload(ajax_url, files[0]);
		r.then(
			function(r) {
				var data = JSON.parse(r.response);
				if (data.code == 200) {
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert.photo = {message: message, type: "success"};
					$scope.consultant_profile.profile.avatar.url = data.results.img_url + "?" +new Date();
				} else {
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert.photo = {message: message, type: "danger"};
				}
			},
			function() {
				// failure
				$scope.alert.photo = {message: "Unknown error", type: "danger"};
			}
		);
	};

	$scope.profileEdit = function(){
		var ajax_url = "/consultantapi/profile-edit";
		var form_data = {
			field			: $scope.edit,
			value			: $scope.consultant_profile.profile[$scope.edit].new_value
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					$scope.consultant_profile.profile[$scope.edit].value = $scope.consultant_profile.profile[$scope.edit].new_value
					$scope.edit = "";
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});

	};

	$scope.emailEdit = function(){
		var ajax_url = "/consultantapi/email-edit";
		var form_data = {
			email			: $scope.consultant_profile.profile.new_email
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					$scope.consultant_profile.profile.email = $scope.consultant_profile.profile.new_email;
					$scope.edit = "";
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});

	};

	$scope.socialAdd = function(){
		var ajax_url = "/consultantapi/social-edit";
		var form_data = {
			data			: $scope.consultant_profile.profile.socials
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					$scope.consultant_profile.profile.socials = data.results;
					$scope.edit = "";
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});
	};

	$scope.deleteCompanyConnection = function(connection){
		var r = confirm("Are you sure you want to delete this company? This cannot be undone!");
		if (r != true) {
			return;
		}

		var ajax_url = "/consultantapi/delete-company-connection";
		var form_data = {
			connection			: connection
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					doStuff();
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});

	};

	$scope.companySearch = function(){
		dsk.custom.companySearch($scope, $http);
	};

	$scope.setCompanySelection = function(company){
		dsk.custom.setCompanySelection($scope, company);
	};

	$scope.addCompany = function(){
		var ajax_url = "/consultantapi/add-company";
		var form_data = {
			company_id			: $scope.registration_company_id,
			company_name		: $scope.registration_company
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					doStuff();
					$scope.show_add_company = false;
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});
	};

	/**
	 * Waits for the user to be loaded
	 *
	 * @type {number}
	 */
	var interval = setInterval(function ()
	{

		if ($scope.user !== undefined) {
			window.clearInterval(interval);
			waitForUser();
		}
	}, 100);

	/**
	 * Loads things that need to wait for the user to be loaded.
	 *
	 * This is wrapped in $apply because something is not working right with the dynamic model names on this page.
	 */
	function waitForUser()
	{
		//getFolders();
		$scope.$apply(function(){
			doStuff()
		});

	}
	function doStuff()
	{
		dsk.custom.getConsultantProfile($scope, $http);
	}

});