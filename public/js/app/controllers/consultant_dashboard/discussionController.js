dsk.controller('discussion', function ($scope, $http, $timeout) {

	$scope.myShowPosts 		= false;
	$scope.upShowPosts 		= false;
	$scope.downShowPosts 	= false;

	/**
	 * reloads the discussions
	 */
	$scope.reload = function()
	{
		dsk.custom.getDiscussions($scope, $http);
	};

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
	 * Adds a post
	 */
	$scope.addPost = function(node){
		if ($scope.new_post === undefined || $scope.new_post.title === undefined || $scope.new_post.content === undefined)
		{
			$scope.post_alert = {message: "Please enter a title and content", type: "danger"};
			$timeout.cancel($scope.timeout);
			$scope.timeout = $timeout(function(){
				$scope.post_alert = undefined;
			}, 3000);
			return;
		}
		var topic_name 	= getTopicName(node);
		var ajax_url = "/consultantapi/add-post";
		var form_data = {
			post_title			: $scope.new_post.title,
			post_content		: $scope.new_post.content,
			post_topic			: $scope[topic_name].id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.new_post = {};
					$scope.show_add_post = false;
					dsk.custom.getDiscussions($scope, $http);
					$scope[topic_name].discussion_post.push(data.results);

					$scope.post_alert = {message: message, type: "success"};

				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.post_alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.post_alert = {message: "Unknown error", type: "danger"};
			});
		$timeout.cancel($scope.timeout);
		$scope.timeout = $timeout(function(){
			$scope.post_alert = undefined;
		}, 3000);

	};

	/**
	 * Deletes a post
	 *
	 * @param post
	 * @returns {boolean}
	 */
	$scope.deletePost = function(post, index, node){
		if (!window.confirm("Are you sure you want to delete this post?")) {
			return false;
		}
		var topic_name 	= getTopicName(node);
		var ajax_url = "/consultantapi/delete-post";
		var form_data = {
			post_id	: post.id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					dsk.custom.getDiscussions($scope, $http);
					$scope.post_alert = {message: message, type: "success"};
					$scope[topic_name].discussion_post.splice(index,1);

				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.post_alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.post_alert = {message: "Unknown error", type: "danger"};
			});
		$timeout.cancel($scope.timeout);
		$scope.timeout = $timeout(function(){
			$scope.post_alert = undefined;
		}, 3000);

	};

	/**
	 * Edits a post
	 *
	 * @param post
	 */
	$scope.editPost = function(post, index, node)
	{
		if (post.new_title === undefined || post.new_content === undefined)
		{
			$scope.post_alert = {message: "Please fill in all required fields.", type: "danger"};
			$scope.show_edit_post = true;
			return;
		}
		var topic_name 	= getTopicName(node);
		var ajax_url = "/consultantapi/edit-post";
		var form_data = {
			post_id	:post.id,
			post_title: post.new_title,
			post_content: post.new_content
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.post_alert = {message: message, type: "success"};
					dsk.custom.getDiscussions($scope, $http);
					$scope[topic_name].discussion_post[index].title = post.new_title;
					$scope[topic_name].discussion_post[index].content = post.new_content;
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.post_alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.post_alert = {message: "Unknown error", type: "danger"};
			});
		$timeout.cancel($scope.timeout);
		$scope.timeout = $timeout(function(){
			$scope.post_alert = undefined;
		}, 3000);

	};

	/**
	 * add a comment
	 *
	 * @param post
	 */
	$scope.addComment = function(post)
	{
		var ajax_url = "/consultantapi/add-comment";
		var form_data = {
			comment			: post.new_comment,
			post_id			: post.id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					dsk.custom.getDiscussions($scope, $http);
					post.new_comment = undefined;
					post.discussion_comment.push(data.results);

				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.comment_alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.comment_alert = {message: "Unknown error", type: "danger"};
			});
		$timeout.cancel($scope.timeout);
		$scope.timeout = $timeout(function(){
			$scope.comment_alert = undefined;
		}, 3000);

	};

	/**
	 * Deletes a comment
	 *
	 * @param comment
	 * @returns {boolean}
	 */
	$scope.deleteComment = function(comment, post_index, comment_index, node){
		if (!window.confirm("Are you sure you want to delete this comment?")) {
			return false;
		}
		var topic_name 	= getTopicName(node);
		var ajax_url = "/consultantapi/delete-comment";
		var form_data = {
			comment_id	: comment.id
		};
		$http.post(ajax_url, form_data)
			.success(function (data) {
				//successful
				if (data.code == 200)
				{
					message = data.message === undefined ? "Unknown error." : data.message;
					dsk.custom.getDiscussions($scope, $http);
					$scope.comment_alert = {message: message, type: "success"};
					$scope[topic_name].discussion_post[post_index].discussion_comment.splice(comment_index, 1);

				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.comment_alert = {message: message, type: "danger"};
				}
			})
			.error(function () { //ajax error
				$scope.comment_alert = {message: "Unknown error", type: "danger"};
			});
		$timeout.cancel($scope.timeout);
		$scope.timeout = $timeout(function(){
			$scope.comment_alert = undefined;
		}, 3000);

	};

	/**
	 * loads a topic into the view
	 *
	 * @param topic
	 * @param node
	 */
	$scope.topicClick = function(topic, node)
	{
		var topic_name 	= getTopicName(node);
		var show 		= getShowName(node);

		$scope[topic_name] 		= topic;
		$scope[show] 			= true;
	};

	/**
	 * just closes the topic view
	 *
	 * @param node
	 */
	$scope.closePosts = function(node)
	{
		var topic_name 	= getTopicName(node);
		var show 		= getShowName(node);

		$scope[topic_name] 		= {};
		$scope[show]  			= false;
	};

	/**
	 * gets a topic name. this is so we can have separate scopes for my categories, upline categories and downline categories
	 *
	 * @param node
	 * @returns {*}
	 */
	function getTopicName(node)
	{
		var topic_name;

		switch(node)
		{
			case('my'):
				topic_name 		= 'my_topic';
				break;
			case('up'):
				topic_name 		= 'up_topic';
				break;
			case('down'):
				topic_name 		= 'down_topic';
				break
		}
		return topic_name;

	}

	/**
	 * gets the topic view name. this is so we can have separate scopes for my categories, upline categories and downline categories
	 *
	 * @param node
	 * @returns {*}
	 */
	function getShowName(node)
	{
		var show;

		switch(node)
		{
			case('my'):
				show 			= 'myShowPosts'
				break;
			case('up'):
				show 			= 'upShowPosts'
				break;
			case('down'):
				show 			= 'downShowPosts'
				break
		}
		return show;
	}


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