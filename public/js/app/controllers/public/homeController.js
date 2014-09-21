dsk.controller('home', function ($scope, $http) {

	$scope.readonly 					= false;
	$scope.registration_is_referral 	= false;

	$scope.goToFeatures = function(){
		window.location.href = "/features";
	};

	$scope.register = function(){
		$scope.alerts = undefined;

		//validate
		if ($scope.registration_password == undefined || $scope.registration_password == '' || $scope.registration_password.length < 6)
			$scope.alerts = [{message: "Password must be 6 characters or more.", type: "danger"}];
        if ($scope.registration_email == undefined || $scope.registration_email == '' || $scope.registration_email.length < 5)
			$scope.alerts = [{message: "Please enter a valid email address", type: "danger"}];

        if ($scope.registration_company_id == undefined || $scope.registration_company_id == '' || $scope.registration_company_id.length < 1)
        {
            if ($scope.registration_company == undefined || $scope.registration_company == '' || $scope.registration_company.length < 3)
                $scope.alerts = [{message: "Please select the company you are with.", type: "danger"}];
        }

        if ($scope.first_name == undefined
			|| $scope.last_name == undefined
			|| $scope.first_name == ''
			|| $scope.first_name.length < 2
			|| $scope.last_name == ''
			|| $scope.last_name.length < 2)
			$scope.alerts = [{message: "Please enter a first and last name", type: "danger"}];

		if ($scope.alerts === undefined)
		{
			var ajax_url = "/ajax/register";
			var form_data = {
				first_name: 	$scope.first_name,
				last_name: 		$scope.last_name,
				email: 			$scope.registration_email,
                password: 		$scope.registration_password,
                company_id: 	$scope.registration_company_id,
				company_name: 	$scope.registration_company,
				is_referral: 	$scope.registration_is_referral
			};
			$http.post(ajax_url, form_data)
				.success(function (data) {
					//successful
					if (data.success == true)
					{
						$scope.alerts = [{message: "Thank you for registering. Please check your email for instructions on accessing your account.", type: "success"}];
						$scope.company_names = null;
						clearForm();

                    } else { //failed
                        if (data.error !== undefined)
                            $scope.alerts = data.error;
					}
                    if ($scope.alerts === undefined)
                        $scope.alerts = [{message: "Unknown error.", type: "danger"}];
				})
				.error(function () { //ajax error
					$scope.alerts = [{message: "Unknown error.", type: "danger"}];
				});
		}
	};

    $scope.companySearch = function(){
		$scope.company_names = null;
		if ($scope.registration_company.length > 3)
        {
            var ajax_url = "/ajax/companySearch";
            var form_data = {
                company_name: 	$scope.registration_company
            };
            $http.post(ajax_url, form_data)
                .success(function (data) {
                    //successful
                    $scope.company_names = data;
                })
        }
    };

    $scope.setCompanySelection = function(company){
        $scope.registration_company_id = company.id;
        $scope.registration_company = company.name;
		$scope.company_names = null;

	};

	clearForm = function(){
        $scope.first_name				= undefined;
        $scope.last_name				= undefined;
        $scope.registration_email		= undefined;
        $scope.registration_password	= undefined;
        $scope.registration_company     = undefined;
        $scope.registration_company_id  = undefined;

	};

	checkReferral = function()
	{
		var ajax_url = "/ajax/getSessionData";
		$http.post(ajax_url)
			.success(function (data) {
				//successful
				if (data.referral !== undefined)
				{
					$scope.registration_company 		= data.referral.company_name;
					$scope.registration_company_id 		= data.referral.company_id;
					$scope.registration_email 			= data.referral.email;
					$scope.readonly 					= true;
					$scope.registration_is_referral 	= true;
				}

			})
	}

	checkReferral();
});