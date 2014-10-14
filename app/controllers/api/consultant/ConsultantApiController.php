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

		/**
		 * Get a user's folders
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetFolders()
		{
			$user_id 		= Auth::id();
			$folder			= new MessageFolder();
			$folders		= $folder->whereUserId($user_id)->get();

			$this->_success('Success', $folders->toArray());

			return Response::json($this->data);
		}

		/**
		 * Get a user's messages
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetMessages()
		{
			$user_id         = Auth::id();
			$user_connection = new UserConnection();
			$message         = new Message();
			$messages        = $message
				->orWhere(function ($query)
				{
					$query->where('from_meta_message_status_id', '=', MetaMessageStatus::STATUS_SENT)
						  ->where('from_user', '=', Auth::id());
				})
				->orWhere(function ($query)
				{
					$query->where('from_meta_message_status_id', '!=', MetaMessageStatus::STATUS_REVOKED)
						  ->where('to_user', '=', Auth::id());
				})
				->with('toMetaMessageStatus',
					   'fromMetaMessageStatus',
					   'fromUser')
				->orderBy('created_at', 'desc')
				->get();

			//now sort them
			$result = [];
			foreach ($messages as $key => $value)
			{
				if ($value->fromUser->id != Auth::id())
				{
					$connection_user = $user_connection->getConnectedUser($value->fromUser->id)->first()->toArray();
					switch ($value->toMetaMessageStatus->name)
					{
						case("New"):
						case("Read"):
							$node = "Inbox";
							break;
						default:
							$node = $value->toMetaMessageStatus->name;
					}

				} else
				{
					$connection_user = NULL;
					$node = "Sent";
				}

				$result[$node][] = [
					'id'              => $value->id,
					'to'              => $value->toUser->fullName,
					'from'            => $value->fromUser->fullName,
					'from_user_id'    => $value->fromUser->id,
					"subject"         => $value->title,
					'message'         => $value->content,
					'time_sent'       => $value->created_at->toDayDateTimeString(),
					'status'          => $value->toMetaMessageStatus->name,
					'connection_user' => $connection_user
				];
			}

			$this->_success('Success', $result);

			return Response::json($this->data);
		}

		/**
		 * Send a message
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postSendMessage()
		{
			$messages = Input::get('message');

			foreach($messages['recipients'] as $key => $value)
			{
				// todo check permissions here - make sure the recipient can recieve from this user
				$message = new Message();
				$message->saveMessage($value['connection_user_id'], $messages['subject'], $messages['content']);
			}
			$this->_success("Message(s) sent.");

			return Response::json($this->data);
		}

		/**
		 * Deletes a list of messages after checking that they are owned
		 * If the message is sent by the logged in user, it sets the from status to deleted
		 * If the message is sent to the logged in user, it sets the to status to deleted
		 * Returns a 403 if the user didn't send or receive the message
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postDeleteMessages()
		{
			$messages = Input::get('messages');

			foreach ($messages as $value)
			{
				$message = Message::find($value);
				if ($message->from_user == Auth::id()) //from
					$message->from_meta_message_status_id = MetaMessageStatus::STATUS_DELETED;
				elseif ($message->to_user == Auth::id()) //to
				{
					//if it's already deleted, delete it for real
					if ($message->to_meta_message_status_id == MetaMessageStatus::STATUS_DELETED)
					{
						$message->delete();
						continue;
					} else {
						$message->to_meta_message_status_id = MetaMessageStatus::STATUS_DELETED;
					}
				} else { //message not sent to or by logged in user so they shouldn't be able to delete it
					$this->_error(403, "Permission denied");
					return Response::json($this->data);
				}
				$message->save();
			}
			$this->_success("Message(s) deleted.");

			return Response::json($this->data);

		}

		/**
		 * Deletes a single message after checking that they are owned
		 * If the message is sent by the logged in user, it sets the from status to deleted
		 * If the message is sent to the logged in user, it sets the to status to deleted
		 * Returns a 403 if the user didn't send or receive the message
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postDeleteMessage()
		{
			//todo security on input - make sure the logged in user owns the messages to delete
			$message_data                       = Input::get('message');
			$message                            = Message::find($message_data['id']);
			if ($message->from_user == Auth::id()) { //from
				if ($message->to_meta_message_status_id == MetaMessageStatus::STATUS_DELETED)
				{
					$message->delete();
					$this->_success("Message(s) deleted.");
					return Response::json($this->data);
				} else
				{
					$message->from_meta_message_status_id = MetaMessageStatus::STATUS_DELETED;
				}
			} elseif ($message->to_user == Auth::id()) //to
				$message->to_meta_message_status_id = MetaMessageStatus::STATUS_DELETED;
			else { //message not sent to or by logged in user so they shouldn't be able to delete it
				$this->_error(403, "Permission denied");
				return Response::json($this->data);
			}

			$message->save();
			$this->_success("Message(s) deleted.");

			return Response::json($this->data);

		}

		/**
		 * Marks a message a read
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postMarkMessage()
		{
			//todo security on input - make sure the logged in user owns the messges to delete
			$message_data = Input::get('message');
			$message_id   = $message_data['id'];

			$message                            = Message::find($message_id);
			$message->to_meta_message_status_id = MetaMessageStatus::STATUS_READ;
			$message->save();
			$this->_success();
			return Response::json($this->data);
		}

	}