dsk.controller('messages', function ($scope, $http) {

	$scope.send_message 				= {};
	$scope.send_message.recipients 		= [];
	$scope.send_message.single 			= false;
	$scope.message_checkbox 			= [];
	$scope.to_delete 					= [];
	$scope.message_delete 				= {};
	$scope.preview_length 				= 10;

	/**
	 * Adds a recipient to $scope.send_message.recipients
	 *
	 * @param index
	 * @param node
	 */
	$scope.addRecipient = function (index, node)
	{
		$scope.send_message.recipients.push($scope[node][index]);
		$scope[node].splice(index,1);
	};

	/**
	 * Removes recipient from $scope.send_message.recipients
	 *
	 * @param index
	 * @param node
	 */
	$scope.removeRecipient = function (index, node)
	{
		$scope[node].push($scope.send_message.recipients[index]);
		$scope.send_message.recipients.splice(index,1);
	};

	/**
	 * sends a message
	 * - clears the form
	 * - resets the recipients list
	 */
	$scope.sendMessage = function()
	{
		var ajax_url = "/consultantapi/send-message";
		var form_data = {
			message: $scope.send_message
		};
		$http.post(ajax_url, form_data)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					message 					= data.message === undefined ? "Unknown error." : data.message;
					$scope.alert 				= {message: message, type: "success"};
					//clear form
					$scope.send_message.subject = null;
					$scope.send_message.content = null;
					if ($scope.send_message.single === false) {
						//reset recipients
						resetRecipients();
					} else {
						$scope.clearReply();
					}

				} else { //failed
					message 					= data.message === undefined ? "Unknown error." : data.message;
					$scope.alert 				= {message: message, type: "danger"};
				}
				//reload messages
				dsk.custom.getMessages($scope, $http);
			})
			.error(function(data){
				message 		= data.error.message === undefined ? "Unknown error." : data.error.message;
				$scope.alert 	= {message: message, type: "danger"};
			})

	};

	/**
	 * deletes a list of messages
	 *
	 * @param tab
	 */
	$scope.deleteMessages = function (tab)
	{
		if ($scope.to_delete[tab.toLowerCase()] === undefined || $scope.to_delete[tab.toLowerCase()].length == 0) {
			message = "No messages selected.";
			$scope.message_delete.alert = {message: message, type: "warning"};
			return;
		}

		var ajax_url = "/consultantapi/delete-messages";
		var form_data = {
			messages: $scope.to_delete[tab.toLowerCase()]
		};
		$http.post(ajax_url, form_data)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.message_delete.alert = {message: message, type: "success"};
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.message_delete.alert = {message: message, type: "danger"};
				}
				//clear $scope.to_delete array for selected tab
				$scope.to_delete[tab.toLowerCase()].splice(0);
				//clear selected messages
				$scope.message_checkbox.splice(0);
				$scope.selectedAll = false;
				//reload messages
				dsk.custom.getMessages($scope, $http);

			})
			.error(function (data)
			{
				message = data.error.message === undefined ? "Unknown error." : data.error.message;
				$scope.message_delete.alert = {message: message, type: "danger"};
			})
	};

	/**
	 * deletes a single message
	 *
	 * @param message
	 */
	$scope.deleteMessage = function (message)
	{
		var ajax_url = "/consultantapi/delete-message";
		var form_data = {
			message: message
		};
		$http.post(ajax_url, form_data)
			.success(function (data)
			{
				//successful
				if (data.code == 200) {
					dsk.custom.getMessages($scope, $http);
				} else { //failed
					message = data.message === undefined ? "Unknown error." : data.message;
					$scope.message_delete.alert = {message: message, type: "danger"};
				}
				//clear selected messages
				$scope.selectedAll = false;
				$scope.message_checkbox.splice(0);
			})
			.error(function (data)
			{
				message = data.error.message === undefined ? "Unknown error." : data.error.message;
				$scope.message_delete.alert = {message: message, type: "danger"};
			})
	};

	/**
	 * adds a message to the $scope.to_delete array for the selected tab
	 *
	 * @param tab
	 * @param message_id
	 */
	$scope.messageSelection = function(tab, message_id)
	{
		if ($scope.to_delete[tab.toLowerCase()] === undefined)
			$scope.to_delete[tab.toLowerCase()] = [];

		if ($scope.message_checkbox[message_id] == true)
			$scope.to_delete[tab.toLowerCase()].push(message_id);
		else {
			//find and remove from array
			var index = $scope.to_delete[tab.toLowerCase()].indexOf(message_id);
			$scope.to_delete[tab.toLowerCase()].splice(index,1);
		}

	};

	/**
	 * Uhh... checks all checkboxes, duh
	 */
	$scope.checkAll = function ()
	{
		if ($scope.selectedAll) {
			$scope.selectedAll = true;
		} else {
			$scope.selectedAll = false;
		}
		angular.forEach($scope.messages[$scope.tab], function (item)
		{
			$scope.message_checkbox[item.id] = $scope.selectedAll;
			$scope.messageSelection($scope.tab, item.id);
		});

	};

	/**
	 * Displays the full text for a message
	 *
	 * @param message
	 * @param update
	 */
	$scope.showMore = function(message, update)
	{
		message.textLength = message.message.length;
		if (update === true)
			$scope.markAsRead(message);
	};

	/**
	 * Marks a message as read and not new anymore
	 *
	 * @param message
	 * @param update
	 */
	$scope.markAsRead = function (message, update)
	{
		if (message.status == "New" || message.status == "Deleted") {
			var ajax_url = "/consultantapi/mark-message";
			var form_data = {
				message: message
			};
			$http.post(ajax_url, form_data)
				.success(function ()
				{
					if (update === true)
						dsk.custom.getMessages($scope, $http);
					else
						message.status = "Read";
				})
		}
	};

	/**
	 * sets up a reply send screen
	 *
	 * @param message
	 */
	$scope.reply = function (message)
	{
		$('#send_tab').click();
		resetRecipients();
		//add clicked recipient
		$scope.send_message.recipients.push(message.connection_user);
		$scope.send_message.single = true;
	};

	/**
	 * Undoes the reply settings
	 */
	$scope.clearReply = function ()
	{
		$scope.send_message.single = false;
		$scope.send_message.recipients.splice(0);
	};

	/**
	 * clears the recipients added to $scope.send_message.recipients
	 */
	function resetRecipients()
	{
		angular.forEach($scope.send_message.recipients, function (value, key)
		{
			$scope[value.meta_connection_relationship.name.toLowerCase()].push(value);
		});
		$scope.send_message.recipients.splice(0);
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
		//getFolders();
		dsk.custom.getMessages($scope, $http);
		dsk.custom.getTeam($scope, $http);
		/**
		 * See if we were sent from the team page
		 */
		if (sessionStorage.send_to !== undefined)
		{
			$scope.reply(angular.fromJson(sessionStorage.send_to));
			sessionStorage.removeItem('send_to');
		}


	}

	$scope.tab = "Inbox";

});