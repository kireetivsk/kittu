dsk.controller('index', function ($scope, $http) {

    $scope.addTeam = function(){
        relationship = $scope.add_team_relationship;
        email = $scope.add_team_email;
        var ajax_url = "/publicapi/add-team";
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
                    $scope.alerts = [{message: data.message, type: "alert-success"}];
					$scope.add_team_email = "";
					$scope.add_team_relationship = "";
                } else { //failed
                    $scope.alerts = [{message: data.message, type: "alert-danger"}];
                }
            })
            .error(function () { //ajax error
                $scope.alerts = [{message: "Unknown error.", type: "alert-danger"}];
            });

    };

    getUser = function(){
        var ajax_url = "/publicapi/get-session-data";
        $http.post(ajax_url)
            .success(function (data) {
                //successful
				if (data.code == 200)
                	$scope.user = data.results;
            })
    };

    getUser();

});