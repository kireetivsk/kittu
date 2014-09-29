dsk.controller('header', function ($scope, $http) {

	$scope.headerLogin = function(){
		$scope.alerts = undefined;

		//validate
		if ($scope.header_login_password == undefined || $scope.header_login_password == '' || $scope.header_login_password.length < 6)
			$scope.alerts = [{message: "Invalid password", type: "danger"}];
		if ($scope.header_login_email == undefined || $scope.header_login_email == '' || $scope.header_login_email.length < 5)
			$scope.alerts = [{message: "Please enter a valid email address", type: "danger"}];

		if ($scope.alerts === undefined)
		{
			var email = $scope.header_login_email;
			var password = $scope.header_login_password;

			var ajax_url = "/publicapi/login";
			var form_data = {
				email: 			$scope.header_login_email,
				password: 		$scope.header_login_password
			};
			clearForm();
			$http.post(ajax_url, form_data)
				.success(function (data) {
					//successful
					if (data.code == 200)
					{
						window.location.href = "/dashboard";
					} else { //failed
						$scope.alerts = {message: data.message, type: "error"};
					}
				})
				.error(function () { //ajax error
					$scope.alerts = {message: "Unknown error.", type: "danger"};
				});
		}
	};

	clearForm = function(){
		$scope.email				= undefined;
		$scope.password				= undefined;

	};

	$scope.link = function(link){
		window.location.href = link;
	};

	$scope.isActive = function(node){
		if (window.location.pathname == "/" + node)
			return 'active';
	};

});