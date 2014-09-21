dsk.controller('index', function ($scope, $http) {


    $scope.addTeam = function(){
        relationship = $scope.add_team_relationship;
        email = $scope.add_team_email;
        var ajax_url = "/ajax/addTeam";
        var form_data = {
            name			: $scope.user.first_name,
            email			: email,
			relationship	: relationship,
        };
        $http.post(ajax_url, form_data)
            .success(function (data) {
                //successful
                if (data.success == true)
                {
                    $scope.alerts = [{message: "Invite sent", type: "alert-success"}];
					$scope.add_team_email = "";
					$scope.add_team_relationship = "";
                } else { //failed
                    $scope.alerts = [{message: "There was an error. Please try again.", type: "alert-danger"}];
                }
            })
            .error(function () { //ajax error
                $scope.alerts = [{message: "Unknown error.", type: "alert-danger"}];
            });

    };

    getUser = function(){
        var ajax_url = "/ajax/getSessionData";
        $http.post(ajax_url)
            .success(function (data) {
                //successful
                $scope.user = data;
            })
    };

    getUser();


});