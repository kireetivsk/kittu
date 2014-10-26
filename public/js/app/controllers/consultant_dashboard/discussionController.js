dsk.controller('discussion', function ($scope, $http) {

	$scope.addCategory = function(){
		var ajax_url = "/consultantapi/add-category";
		var form_data = {
			category_name			: $scope.new_category.name,
			category_description	: $scope.new_category.description,
			category_permission		: $scope.new_category.permission
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					$scope.new_category = {};
					$scope.show_add_category = false;
					dsk.custom.getDiscussionMyCategories($scope, $http);

				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});
	};

	$scope.deleteCategory = function(category){
		var ajax_url = "/consultantapi/delete-category";
		var form_data = {
			category_id	: category.id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					dsk.custom.getDiscussionMyCategories($scope, $http);

				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.alert = {message: "Unknown error", type: "danger"};
			});
	};

	$scope.edit = function(category)
	{
		var ajax_url = "/consultantapi/edit-category";
		var form_data = {
			category_id	:category.id,
			category_title: category.title,
			category_description: category.description,
			category_permission: category.permission_id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					//dsk.custom.getDiscussionMyCategories($scope, $http);

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
	 */
	function waitForUser()
	{
		dsk.custom.getDiscussionMeta($scope, $http);
		dsk.custom.getDiscussionMyCategories($scope, $http);
	}

	$scope.tab = "View";

});