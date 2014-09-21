dsk.controller('public', function ($scope, $http) {

	$scope.saveContactForm = function(){
		if ($scope.contact_name === undefined || $scope.contact_email === undefined || $scope.contact_message === undefined)
			return false;
		var ajax_url = "/publicapi/save-contact-from";
		var form_data = {
			name			: $scope.contact_name,
			email			: $scope.contact_email,
			message			: $scope.contact_message,
			acquired_from	: "contact form",
			notes			: "page: " + window.location.pathname
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					$scope.alerts = [{message: "Thank you, we will be in touch.", type: "success"}];
					$scope.footer_email = "";
					clearForm();
				} else { //failed
					$scope.alerts = [{message: "There was an error. Please try again.", type: "danger"}];
					$scope.footer_email = "";
				}
			})
			.error(function () { //ajax error
				$scope.alerts = [{message: "Unknown error.", type: "danger"}];
				$scope.footer_email = "";
			});

	};


	var clearForm = function()
	{
		$scope.contact_name 		= undefined;
		$scope.contact_email 		= undefined;
		$scope.contact_message 		= undefined;
		$scope.email				= undefined;
		$scope.password				= undefined;
	}

	$scope.login = function(){
		$scope.alerts = undefined;

		//validate
		if ($scope.password == undefined || $scope.password == '' || $scope.password.length < 6)
			$scope.alerts = [{message: "Invalid password", type: "danger"}];
		if ($scope.email == undefined || $scope.email == '' || $scope.email.length < 5)
			$scope.alerts = [{message: "Please enter a valid email address", type: "danger"}];

		if ($scope.alerts === undefined)
		{
			var email = $scope.email;
			var password = $scope.password;

			var ajax_url = "/publicapi/login";
			var form_data = {
				email: 			$scope.email,
				password: 		$scope.password
			};
			clearForm();
			$http.post(ajax_url, form_data)
				.success(function (data) {
					//successful
					if (data.code == 200)
					{
						window.location.href = "/dashboard";
					} else { //failed
						$scope.alerts = data.message;
					}
				})
				.error(function () { //ajax error
					$scope.alerts = [{message: "Unknown error.", type: "danger"}];
				});
		}
	};

	$scope.link = function(link){
		window.location.href = link;
	};

});