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
			$company_id      = Session::get('userdata.current.company');
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
				->orWhere(function ($query) use($user_id)
				{
					$query->where('from_meta_message_status_id', '=', MetaMessageStatus::STATUS_SENT)
						  ->where('from_user', '=',$user_id);
				})
				->orWhere(function ($query) use($user_id)
				{
					$query->where('from_meta_message_status_id', '!=', MetaMessageStatus::STATUS_REVOKED)
						  ->where('to_user', '=', $user_id);
				})
				->with(['toMetaMessageStatus',
					   'fromUser',
					   'toUser'
					   ])
				->orderBy('created_at', 'desc')
				->get();

			//now sort them
			$result = [];
			foreach ($messages as $key => $value)
			{
				// ignore users we have blocked
				if ($value->from_user != $user_id)
				{
					$permission = $user_connection->getConnectedUser($value->from_user)->first();
					if ($permission->meta_connection_status_id == MetaConnectionStatus::CONNECTION_STATUS_BLOCKED) {
						continue;
					}

					$connection_user = $permission->toArray();
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
					'from_user_id'    => $value->from_user,
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
				// todo check permissions here - make sure the recipient can receive from this user
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
						$message->to_meta_message_status_id = MetaMessageStatus::STATUS_DELETED_FOR_REAL;
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
			$message_data = Input::get('message');
			$message      = Message::find($message_data['id']);
			if ($message->from_user == Auth::id()) { //from
				$message->from_meta_message_status_id = MetaMessageStatus::STATUS_DELETED;
			} elseif ($message->to_user == Auth::id()) { //to
				if ($message->to_meta_message_status_id == MetaMessageStatus::STATUS_DELETED)
				{
					$message->to_meta_message_status_id = MetaMessageStatus::STATUS_DELETED_FOR_REAL;
				} else
					$message->to_meta_message_status_id = MetaMessageStatus::STATUS_DELETED;
			} else { //message not sent to or by logged in user so they shouldn't be able to delete it
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

		/**
		 * get the consultant profile and settings
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetConsultantProfile()
		{
			$user_profile = new UserProfile();
			$profile = $user_profile->getConsultantProfile(Auth::id());

			//avatar
			if (array_key_exists('avatar', $profile['profile']))
				$profile['profile']['avatar']['url'] = S3_URL . AVATAR_FOLDER . DS . $profile['profile']['avatar']['value'];
			else
				$profile['profile']['avatar']['url'] = S3_URL . AVATAR_FOLDER . DS . AVATAR_DEFAULT_FILENAME;

			//email
			$user = new User();
			$user_data = $user->find(Auth::id());
			$profile['profile']['email'] = $user_data->email;
			$profile['profile']['username'] = $user_data->username;

			//socials
			$social_networks = new MetaSocialNetwork();
			$networks = $social_networks->all();
			foreach($networks as $value)
				$networks_clean[$value->slug] = $value;
			$profile['fields']['socials'] = $networks_clean;

			if (array_key_exists('social', $profile['profile']))
			{
				$profile_socials = json_decode($profile['profile']['social']['value']);
				foreach($profile['fields']['socials'] as $value) {
					$profile['profile']['socials'][$value->slug] = [
						'network_name' => $networks_clean[$value->slug]->name,
						'network_id'   => $networks_clean[$value->slug]->id,
						'webpage'      => $profile_socials->{$value->slug}->webpage
					];
				}
				unset($profile['profile']['social']);
			} else {
				foreach($profile['fields']['socials'] as $value)
					$profile['profile']['socials'][$value->slug] = ['webpage' => '', 'network_name' => '', 'network_id' => ''];
			}

			//get companies
			$user_companies = $user->find(Auth::id())->company()->get();
			foreach($user_companies as $company)
			{
				$count = UserConnection::where('user_id', '=', Auth::id())->where('company_id', '=', $company->id)->count();
				$profile['profile']['companies'][$company->slug] = $company;
				$profile['profile']['companies'][$company->slug]['connections'] = $count;
			}

			$this->_success('Success', $profile);

			return Response::json($this->data);
		}

		/**
		 * upload a photo
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postUploadPhoto()
		{
			if (Input::hasFile('photo') && Input::file('photo')->isValid())
			{
				$approved_exts = [
					'jpg', 'gif', 'png', 'jpeg'
				];
				$file = Input::file('photo');
				$ext = $file->getClientOriginalExtension();
				if (!in_array(strtolower($ext), $approved_exts))
				{
					$this->_error(500, trans('general.invalid_file_type'));
					return Response::json($this->data);
				}
				if ($file->getSize() > MAX_UPLOAD_SIZE)
				{
					$this->_error(500, trans('general.file_too_big', ['size' => MAX_UPLOAD_SIZE]));
					return Response::json($this->data);
				}
				$file_name = 'avatar_' . Auth::id() . '.' . $ext;

				$s3 = AWS::get('s3');
				$result = $s3->putObject(array(
											 'Bucket'     => 'dskapp',
											 'Key'        => AVATAR_FOLDER . DS . $file_name,
											 'SourceFile' => $file->getRealPath(),
											 'ACL' => 'public-read'
										 ));

				$data = $result->toArray();
				$saved_path = $data['ObjectURL'];

				//save as setting
				$profile = new UserProfile();
				$profile->set(Auth::id(), MetaProfileType::PROFILE_FIELD_AVATAR, $file_name);

				$this->_success('Success', ['img_url' => $saved_path]);
				return Response::json($this->data);
			} else {
				$this->_error(500, "Invalid file");

				return Response::json($this->data);
			}

		}

		/**
		 * edit a profile field
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postProfileEdit()
		{
			$profile_data = Input::get('value');
			$profile_field = Input::get('field');

			//get profile type
			$meta_profile_type = new MetaProfileType();
			$profile_type = $meta_profile_type->whereSlug($profile_field)->get();

			//save
			$profile = new UserProfile();
			$profile->set(Auth::id(), $profile_type->first()->id, $profile_data);

			$this->_success(trans('general.saved'));
			return Response::json($this->data);
		}

		/**
		 * Special handling of the email profile field since it's in the users table
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postEmailEdit()
		{
			$user = new User();
			$this_user = $user->find(Auth::id());
			$this_user->email = Input::get('email');

			$this_user->updateUniques();

			if ($this_user->validate()) {
				$this->_success(trans('general.saved'));

				return Response::json($this->data);
			} else {
				$this->_error(500, $this_user->validationErrors->first('email'));

				return Response::json($this->data);

			}
		}

		/**
		 * edit social networks
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postSocialEdit()
		{
			$socials = [];
			$data = Input::get('data');
			foreach($data as $key => &$value)
			{
				if (!empty($value['new_value']))
				{
					$validator =  Validator::make(
						array('url' => $value['new_value']),
						array('url' => 'required|url')
					);
					if ($validator->fails())
					{
						$this->_error(500, $validator->messages()->first('url'));
						return Response::json($this->data);
					}
					$value['webpage'] = $value['new_value'];
				}
				unset($data[$key]['new_value']);
				$socials[$key] = $value;
			}
			$result = json_encode($socials);

			//save
			$profile = new UserProfile();
			$profile->set(Auth::id(), MetaProfileType::PROFILE_FIELD_SOCIAL, $result);

			$this->_success(trans('general.saved'), $socials);
			return Response::json($this->data);
		}

		/**
		 * delete a connection to a company
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postDeleteCompanyConnection()
		{
			$data = Input::get('connection');
			$user = new User();
			$user->deleteCompanyConnection(Auth::id(), $data['pivot']['company_id']);

			$this->_success();
			return Response::json($this->data);
		}

		/**
		 * Add a company connection
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postAddCompany()
		{
			$user = User::find(Auth::id());
			$company_id = Input::get('company_id');
			$company_name = Input::get('company_name');

			if (empty($company_id))
			{
				$company = new Company();
				if (!$company_id = $company->addByName($company_name))
				{
					$this->_error(500, trans('general.company_name_invalid'));
					return Response::json($this->data);
				}
			}
			$user->company()->attach($company_id);

			$this->_success();
			return Response::json($this->data);
		}

		/**
		 * Block a user
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postBlockUser()
		{
			$other_user = Input::get('person');

			$connection = UserConnection::where('user_id', '=', Auth::id())->where('connection_user_id', '=', $other_user['connection_user']['id'])->first();
			$connection->meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_BLOCKED;
			$connection->update();
			$this->_success();
			return Response::json($this->data);

		}

		/**
		 * Unblock a user
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postUnblockUser()
		{
			$other_user = Input::get('person');

			$connection = UserConnection::where('user_id', '=', Auth::id())->where('connection_user_id', '=', $other_user['connection_user']['id'])->first();
			$connection->meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
			$connection->update();
			$this->_success();
			return Response::json($this->data);

		}

		/**
		 * Add a new discussion category for a user
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postAddCategory()
		{
			$category_name 							= Input::get('category_name');
			$category_description 					= Input::get('category_description');
			$category_permission 					= Input::get('category_permission');

			$cat 									= new DiscussionCategory();
			$cat->user_id 							= Auth::id();
			$cat->title 							= $category_name;
			$cat->description 						= $category_description;
			$cat->meta_discussion_permission_id 	= $category_permission;
			$cat->meta_discussion_status_id 		= MetaDiscussionStatus::PUBLISHED;
			$cat->save();

			$this->_success();
			return Response::json($this->data);

		}

		/**
		 * Get discussion meta fields
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetDiscussionMeta()
		{
			$result = [
				"statuses" => MetaDiscussionStatus::all(),
				"types" => MetaDiscussionType::all(),
				"permissions" => MetaDiscussionPermission::all()
			];
			$this->_success('Success', $result);
			return Response::json($this->data);

		}

		public function postGetDiscussionMyCategories()
		{
			$categories = DiscussionCategory::whereUserId(Auth::id())
				->with('metaDiscussionPermission')
				->get();

			$result = [];
			foreach($categories as $category)
			{
				$topic_count = DiscussionTopic::
								where('discussion_category_id', '=', $category->id)
								->where('meta_discussion_status_id', '=', MetaDiscussionStatus::PUBLISHED)
								->count();

				$result[] = [
					'id'            => $category->id,
					'title'         => $category->title,
					'description'   => $category->description,
					'topic_count'   => $topic_count,
					'permission'    => $category->metaDiscussionPermission->name,
					'permission_id' => $category->meta_discussion_permission_id,
				];
			}

			$this->_success('Success', $result);
			return Response::json($this->data);
		}

		public function postDeleteCategory()
		{
			$dicussion_category = new DiscussionCategory();
			$category_id = Input::get('category_id');
			$category_owner = $dicussion_category->whereId($category_id)->first(['user_id']);

			//security
			if ($category_owner->user_id == Auth::id())
			{
				$dicussion_category->remove($category_id);

				$this->_success(trans('general.discussion_category_deleted'));
				return Response::json($this->data);

			} else {

				$this->_error(403, trans('general.not_authorized2'));
				return Response::json($this->data);
			}
		}

		public function postEditCategory()
		{

			$id = Input::get('category_id');
			$name = Input::get('category_title');
			$description = Input::get('category_description');
			$permission = Input::get('category_permission');

			$cat = DiscussionCategory::find($id);
			$cat->title = $name;
			$cat->description = $description;
			$cat->meta_discussion_permission_id = $permission;
			$cat->save();

			$this->_success(trans('general.discussion_category_saved'));
			return Response::json($this->data);

		}

		public function postGetDiscussions()
		{
			$user = new User();
			$user_profile = new UserProfile();

			$result = $user->getDiscussions();

			//get profile
			$profiles = [];

			//my, upline, downline
			foreach($result as $level => &$categories)
			{
				// categories
				if (empty($categories))
					continue;
				foreach($categories as $cat_key => &$category)
				{
					//get owner profile
					if (array_key_exists($category['user_id'], $profiles))
						$category['owner'] = $profiles[$category['user_id']];
					else {
						$category['owner'] = $user_profile->getPublicProfile($category['user_id']);
						$profiles[$category['user_id']] = $category['owner'];
					}

					//loop through topics
					if (empty($category['discussion_topic']))
						continue;
					foreach ($category['discussion_topic'] as $topic_key => &$topic)
					{
						//get owner profile
						if (array_key_exists($topic['user_id'], $profiles))
							$topic['owner'] = $profiles[$topic['user_id']];
						else {
							$topic['owner'] = $user_profile->getPublicProfile($topic['user_id']);
							$profiles[$topic['user_id']] = $topic['owner'];
						}

						//posts
						if (empty($topic['discussion_post']))
							continue;
						foreach ($topic['discussion_topic'] as $post_key => &$post)
						{
							//get owner profile
							if (array_key_exists($post['user_id'], $profiles))
								$post['owner'] = $profiles[$post['user_id']];
							else {
								$post['owner'] = $user_profile->getPublicProfile($post['user_id']);
								$profiles[$post['user_id']] = $post['owner'];
							}

							//comments
							if (empty($post['discussion_comment']))
								continue;
							foreach ($post['discussion_comment'] as $comment_key => &$comment)
							{
								//get owner profile
								if (array_key_exists($comment['user_id'], $profiles))
									$comment['owner'] = $profiles[$comment['user_id']];
								else {
									$comment['owner'] = $user_profile->getPublicProfile($comment['user_id']);
									$profiles[$comment['user_id']] = $comment['owner'];
								}
							}
						}
					}
				}
			}

			$this->_success('Success', $result);
			return Response::json($this->data);
		}

	}

