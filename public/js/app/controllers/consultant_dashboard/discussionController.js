dsk.controller('discussion', function ($scope, $http) {

	/**
	 * Adds a topic to a category
	 *
	 * @param category
	 * @param new_topic
	 */
	$scope.addTopic = function(category, new_topic){
		var ajax_url = "/consultantapi/add-topic";
		var form_data = {
			topic_title			: new_topic.title,
			topic_description	: new_topic.description,
			topic_category		: category.id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};
					$scope.new_topic = {};
					$scope.show_add_topic = false;
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

	/**
	 * Edits a topic
	 *
	 * @param topic
	 */
	$scope.editTopic = function(topic)
	{
		var ajax_url = "/consultantapi/edit-topic";
		var form_data = {
			topic_id			: topic.id,
			topic_title			: topic.title,
			topic_description	: topic.description
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.alert = {message: message, type: "success"};

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
	 * Deletes a topic
	 *
	 * @param topic
	 * @returns {boolean}
	 */
	$scope.deleteTopic = function(topic){
		if (!window.confirm("Are you sure you want to delete this topic?")) {
			return false;
		}
		var ajax_url = "/consultantapi/delete-topic";
		var form_data = {
			topic_id	: topic.id
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

	/**
	 * Adds a category
	 */
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

	/**
	 * Deletes a category
	 *
	 * @param category
	 * @returns {boolean}
	 */
	$scope.deleteCategory = function(category){
		if (!window.confirm("Are you sure you want to delete this category?")) {
			return false;
		}
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

	/**
	 * Edits a category
	 *
	 * @param category
	 */
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
		dsk.custom.getDiscussions($scope, $http);
	}

	$scope.tab = "View";

});