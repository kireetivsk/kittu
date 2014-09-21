dsk.controller('footer', function ($scope, $http) {

	$scope.saveFooterEmail = function(){
		if ($scope.footer_email === undefined)
			return false;
		var ajax_url = "/publicapi/save-email";
		var form_data = {
			email: $scope.footer_email,
			acquired_from: "home page footer",
			notes: "Looking for a direct sales company? We can help you find the right team for you."
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					$scope.alerts = {message: "Thank you, we will contact you when our matching system is ready.", type: "success"};
					$scope.footer_email = "";
				} else { //failed
					$scope.alerts = {message: "There was an error. Please try again.", type: "danger"};
					$scope.footer_email = "";
				}
			})
			.error(function () { //ajax error
				$scope.alerts = {message: "Unknown error.", type: "danger"};
				$scope.footer_email = "";
			});

	};




});