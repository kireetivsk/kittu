<?php

	/**
	 * ConsultantApiController.php
	 */
	class ConsultantApiController extends ApiController
	{
		/**
		 * Module auth
		 */
		public function __construct()
		{
			if (!Auth::check()) {
				App::abort(401, Lang::get('general.not_authorized'));
			}
		}

		/**
		 * get notifications and count
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetNotifications()
		{
			$user_id = Auth::id();
			$notification = new Notification();
			$notifications = $notification->get($user_id);
			foreach ($notifications as &$notification)
				$notification->body = Dsk::insertBreaks($notification->body, 38);
			$result = [
				'count'         => count($notifications),
				'notifications' => $notifications->toArray()
			];
			$this->_success('Success', $result);

			return Response::json($this->data);
		}

		/**
		 * Clear ALL notifications
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postClearNotifications()
		{
			$notification 	= new Notification();
			$notifications 	= Input::get('notifications');

			foreach ($notifications as $value)
				$notification->clearNotification($value['id']);

			$this->_success();
			return Response::json($this->data);
		}

		/**
		 * Clear ONE notification
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postClearNotification()
		{
			$notification 				= new Notification();
			$notification_to_delete 	= Input::get('notification');

			$notification->clearNotification($notification_to_delete);

			$this->_success();

			return Response::json($this->data);
		}

		/**
		 * Send a connection request
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postAddTeam()
		{
			$email 			= Input::get('email');
			$relationship 	= Input::get('relationship');
			$name 			= Input::get('name');

			$connection_request = new ConnectionRequest();
			$result = $connection_request->connect($email, $relationship, $name);

			if ($result)
				$this->_success('Connection requested.');
			else
				$this->_error(500, Lang::get('general.connection_request_fail'));

			return Response::json($this->data);
		}

		/**
		 * get connection requests to display on dashboard/connection-requests
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetConnectionRequests()
		{
			$user_id         = Input::get('user_id');
			$company_id      = Input::get('company_id');
			$user_connection = new UserConnection();
			$result          = $user_connection->getUserConnectionRequests($user_id, $company_id);

			if (!$result->isEmpty())
				$this->_success('Success', $result->toArray());
			else
				$this->_error(500, Lang::get('general.get_connection_request_fail'));

			return Response::json($this->data);
		}

		public function postAcceptRequest()
		{
			$this->_success();
//			$this->_error(500, Lang::get('general.get_connection_request_fail'));

			return Response::json($this->data);

		}

	}