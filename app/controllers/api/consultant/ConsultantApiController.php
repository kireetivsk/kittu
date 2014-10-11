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
			//todo: check security on these input vars
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
			//todo: check security on these input vars
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
			$user_id 		 = Auth::id();
			$company_id      = Input::get('company_id');
			$user_connection = new UserConnection();
			$result          = $user_connection->getUserConnectionRequests($user_id, $company_id);

			if (!$result->isEmpty())
				$this->_success('Success', $result->toArray());
			else
				$this->_error(500, Lang::get('general.get_connection_request_fail'));

			return Response::json($this->data);
		}

		/**
		 * get rejected connection requests to display on dashboard/connection-requests
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetRejectedConnectionRequests()
		{
			$user_id 		 = Auth::id();
			$company_id      = Input::get('company_id');
			$user_connection = new UserConnection();
			$result          = $user_connection->getRejectedUserConnectionRequests($user_id, $company_id);

			if (!$result->isEmpty())
				$this->_success('Success', $result->toArray());
			else
				$this->_error(500, Lang::get('general.get_connection_request_fail'));

			return Response::json($this->data);
		}

		/**
		 * Accept a connection request
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postAcceptRequest()
		{
			//todo: check security on these input vars
			$request_id      = Input::get('request_id');
			$user_connection = new UserConnection();
			$user_connection->accept($request_id);

			$this->_success();
			return Response::json($this->data);
		}

		/**
		 * Reject a connection request
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postRejectRequest()
		{
			//todo: check security on these input vars
			$request_id      = Input::get('request_id');
			$user_connection = new UserConnection();
			$user_connection->reject($request_id);

			$this->_success();
			return Response::json($this->data);
		}

		/**
		 * Get connected team members
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetTeam()
		{
			$user_id 		 = Auth::id();
			$user_connection = new UserConnection();
			$sponsor         = $user_connection->getConnectedSponsor($user_id)->toArray();
			$upline          = $user_connection->getConnectedUpline($user_id)->toArray();
			$downline        = $user_connection->getConnectedDownline($user_id)->toArray();

			$team = [
				'sponsor'  => $sponsor,
				'downline' => $downline,
				'upline'   => $upline
			];

			$this->_success('Success', $team);
			return Response::json($this->data);
		}

	}