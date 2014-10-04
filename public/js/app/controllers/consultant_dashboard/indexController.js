dsk.controller('index', function ($scope, $http, Data) {

    $scope.addTeam = function(){
        relationship = $scope.add_team_relationship;
        email = $scope.add_team_email;
        var ajax_url = "/consultantapi/add-team";
        var form_data = {
            name			: $scope.user.first_name,
            email			: email,
			relationship	: relationship,
        };
        $http.post(ajax_url, form_data)
            .success(function (data) {
                //successful
                if (data.code == 200)
                {
                    $scope.alerts = {message: data.message, type: "alert-success"};
					$scope.add_team_email = "";
					$scope.add_team_relationship = "";
                } else { //failed
					message = data.error === undefined ? "Unknown error." : data.error.message
					$scope.alerts = {message: message, type: "alert-danger"};
                }
            })
            .error(function (data) { //ajax error
				message = data.error === undefined ? "Unknown error." : data.error.message
                $scope.alerts = {message: message, type: "alert-danger"};
            });

    };

	if (Data.getUser.lock !== true) {
		Data.getUser.lock = true;
		Data.getUser.ajax().success(function (result) {
			$scope.user = result.results;
			Data.getUser.lock = false;
		}).error(function () {
			Data.getUser.lock = false;
		})
	}

});