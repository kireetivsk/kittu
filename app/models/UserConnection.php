<?php
	use LaravelBook\Ardent\Ardent;

/**
 * UserConnection
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $company_id
 * @property integer $connection_user_id
 * @property integer $meta_connection_status_id
 * @property integer $meta_connection_relationship_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereConnectionUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereMetaConnectionStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereMetaConnectionRelationshipId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereDeletedAt($value)
 * @property-read \MetaConnectionRelationship $metaConnectionRelationship
 * @property-read \MetaConnectionStatus $metaConnectionStatus
 * @property-read \Company $company
 * @property-read \User	$user
 * @property-read \User	$connectionUser
 * @property-read \UserConnectionNote $userConnectionNote
 */
class UserConnection extends Ardent {
	protected $fillable = [];

	protected $hidden = [
		'meta_connection_status_id',
		'meta_connection_relationship_id',
		'updated_at',
		'deleted_at'
	];


	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'company_id' 						=> 'required|integer',
		'connection_user_id'				=> 'required|integer',
		'meta_connection_status_id' 		=> 'required|integer',
		'meta_connection_relationship_id' 	=> 'required|integer'
	];

	//relationships
	public function metaConnectionRelationship()
	{
		return $this->belongsTo('MetaConnectionRelationship');
	}

	public function metaConnectionStatus()
	{
		return $this->belongsTo('MetaConnectionStatus');
	}

	public function company()
	{
		return $this->belongsTo('Company');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function connectionUser()
	{
		return $this->belongsTo('User', 'connection_user_id');
	}

	public function userConnectionNote()
	{
		return $this->hasMany('UserConnectionNote');
	}

	//public methods

	/**
	 * Create a connection from a raw request - involves checking permissions/settings
	 *
	 * @param $that_user
	 * @param $relationship
	 * @param $company
	 *
	 * @return bool
	 */
	public function makeConnection($that_user, $relationship, $company)
	{
		$notification 			= new Notification();
		$settings 				= new UserSetting();

		$this_user 				= Session::get('userdata');

		$that_user_name 		= $that_user->first_name . " " . $that_user->last_name;

		$relationship_opposite = MetaConnectionRelationship::getRelationshipOppositeByName($relationship);

		//set the notifications
		$this_notification_accepted  = [
			'user_id'				   		=> $this_user['id'],
			'origin'						=> "app/models/UserConnection.php:" . __LINE__,
			'title'					 		=> trans('general.connection_notification'),
			'body'					  		=> trans('general.connection_body_1', ['name' => $that_user_name, 'relationship' => $relationship]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION,
			'created_at' 					=> DB::raw('NOW()'),
			'sent'							=> DB::raw('NOW()')
		];

		$this_notification_requested = [
			'user_id'				   		=> $this_user['id'],
			'origin'						=> "app/models/UserConnection.php:" . __LINE__,
			'title'					 		=> trans('general.connection_request'),
			'body'					  		=> trans('general.connection_body_2', ['name' => $that_user_name, 'relationship' => $relationship]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION,
			'created_at'                    => DB::raw('NOW()'),
			'sent'                          => DB::raw('NOW()')
		];

		$that_notification_accepted  = [
			'user_id'				   		=> $that_user->id,
			'origin' 						=> "app/models/UserConnection.php:" . __LINE__,
			'title'					 		=> trans('general.connection_notification'),
			'body'					  		=> trans('general.connection_body_3', ['name' => $this_user['full_name'], 'relationship' => $relationship_opposite]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION,
			'created_at'                    => DB::raw('NOW()'),
			'sent'                          => DB::raw('NOW()')
		];
		$that_notification_requested = [
			'user_id'				   		=> $that_user->id,
			'origin' 						=> "app/models/UserConnection.php:" . __LINE__,
			'title'					 		=> trans('general.connection_request'),
			'body'					  		=> trans('general.connection_body_4', ['name' => $this_user['full_name'], 'relationship' => $relationship_opposite]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION,
			'created_at'                    => DB::raw('NOW()'),
			'sent'                          => DB::raw('NOW()')
		];

		//get the connection setting
		$that_user_connection_setting = $settings->getSettingValue(UserSetting::CATEGORY_CONNECTION_PERMISSION, $that_user->userSetting);

		//store the notification
		switch ($that_user_connection_setting) {
			case ('verify_all'):
				$meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_REQUESTED;
				$notification->insert($this_notification_requested);
				$notification->insert($that_notification_requested);
				break;
			case ('accept_all'):
				$meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
				$notification->insert($this_notification_accepted);
				$notification->insert($that_notification_accepted);
				break;
			case ('verify_upline'):
				if ($relationship == 'upline' || $relationship == 'sponsor') {
					$meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_REQUESTED;
					$notification->insert($this_notification_requested);
					$notification->insert($that_notification_requested);
				} else {
					$meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
					$notification->insert($this_notification_accepted);
					$notification->insert($that_notification_accepted);
				}
				break;
			case ('verify_downline'):
				if ($relationship == 'downline') {
					$meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_REQUESTED;
					$notification->insert($this_notification_requested);
					$notification->insert($that_notification_requested);
				} else {
					$meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
					$notification->insert($this_notification_accepted);
					$notification->insert($that_notification_accepted);
				}
				break;
		}

		//store the connection request
		$this_data                                  = new self;
		$this_data->user_id                         = $this_user['id'];
		$this_data->company_id                      = $company;
		$this_data->connection_user_id              = $that_user->id;
		$this_data->meta_connection_status_id       = $meta_connection_status_id;
		$this_data->meta_connection_relationship_id = MetaConnectionRelationship::$relationships[$relationship];

		try
		{
			$this_data->save();
		} catch (Exception $e)
		{
			return FALSE;
		}

	}


	/**
	 *
	 * Make a connection from a referral link.
	 * No need to check permissions.
	 * todo: only auto auth the connection being responded to
	 * currently it auto accepts all requested connections
	 *
	 * @param $user_id
	 * @param $email
	 * @param $company_id
	 *
	 * @return bool
	 */
	public function makeReferralConnections($user_id, $email, $company_id)
	{
		$notification 	= new Notification();
		$referrals 		= ConnectionRequest::whereEmail($email)->with('metaConnectionRelationship')->get();

		$this_user 		= User::find($user_id);

		foreach ($referrals as $referral)
		{
			$relationship_opposite	  		= MetaConnectionRelationship::getRelationshipOppositeById($referral->meta_connection_relationship_id);
			$relationship_opposite_name 	= MetaConnectionRelationship::getRelationshipName($relationship_opposite);
			$relationship_name		  		= MetaConnectionRelationship::getRelationshipName($referral->meta_connection_relationship_id);

			$that_user 						= User::find($referral->user_id);

			//the user signing up
			$this_data                                  = new self;
			$this_data->user_id                         = $user_id;
			$this_data->company_id                      = $company_id;
			$this_data->connection_user_id              = $referral->user_id;
			$this_data->meta_connection_status_id       = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
			$this_data->meta_connection_relationship_id = $relationship_opposite;

			$this_notification_accepted = [
				'user_id'				   			=> $user_id,
				'origin'							=> "app/models/UserConnection.php:" . __LINE__,
				'title'					 			=> trans('general.connection_notification'),
				'body'					  			=> trans('general.connection_body_1', ['name' => $that_user->full_name, 'relationship' => $relationship_name]),
				'meta_notification_type_id' 		=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION,
				'created_at'                        => DB::raw('NOW()'),
				'sent'                              => DB::raw('NOW()')
			];

			//the user getting connected to
			$that_data                                  = new self;
			$that_data->user_id                         = $referral->user_id;
			$that_data->company_id                      = $company_id;
			$that_data->connection_user_id              = $user_id;
			$that_data->meta_connection_status_id       = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
			$that_data->meta_connection_relationship_id = $referral->meta_connection_relationship_id;

			$that_notification_accepted = [
				'user_id'				   			=> $referral->user_id,
				'origin'							=> "app/models/UserConnection.php:" . __LINE__,
				'title'					 			=> trans('general.connection_notification'),
				'body' 								=> trans('general.connection_body_5', ['name' => $this_user->full_name, 'relationship' => $relationship_opposite_name]),
				'meta_notification_type_id' 		=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION,
				'created_at'                        => DB::raw('NOW()'),
				'sent'                              => DB::raw('NOW()')
			];

			try
			{
				$this_data->save();
				$notification->insert($this_notification_accepted);

				$that_data->save();
				$notification->insert($that_notification_accepted);

			} catch (Exception $e)
			{
				return FALSE;
			}
		}
	}

	/**
	 * Get all open connection requests
	 *
	 *
	 * @param $user_id
	 * @param $company_id
	 *
	 * @return mixed
	 */
	public function getUserConnectionRequests($user_id, $company_id)
	{
		$connection_requests = self::where("connection_user_id", '=', $user_id)
								   ->where('company_id', '=', $company_id)
								   ->where('meta_connection_status_id', '=', MetaConnectionStatus::CONNECTION_STATUS_REQUESTED)
								   ->with('metaConnectionStatus', 'metaConnectionRelationship', 'user')
								   ->get();
		$requests            = Dsk::removeDuplicates($connection_requests, 'email');

		return $requests;
	}

	/**
	 * Get all open connection requests
	 *
	 *
	 * @param $user_id
	 * @param $company_id
	 *
	 * @return mixed
	 */
	public function getRejectedUserConnectionRequests($user_id, $company_id)
	{
		$connection_requests = self::where("connection_user_id", '=', $user_id)
								   ->where('company_id', '=', $company_id)
								   ->where('meta_connection_status_id', '=', MetaConnectionStatus::CONNECTION_STATUS_REJECTED)
								   ->with('metaConnectionStatus', 'metaConnectionRelationship', 'user')
								   ->get();
		$requests            = Dsk::removeDuplicates($connection_requests, 'email');

		return $requests;
	}

	/**
	 * Process an accepted connection request
	 *
	 * @param $request_id
	 */
	public function accept($request_id)
	{
		$notification = new Notification();

		$this_connection = $this->find($request_id);

		//set opposite connection
		$relationship_opposite = MetaConnectionRelationship::getRelationshipOppositeById($this_connection->meta_connection_relationship_id);
		$opposite                                  = new self;
		$opposite->user_id                         = $this_connection->connection_user_id;
		$opposite->company_id                      = $this_connection->company_id;
		$opposite->connection_user_id              = $this_connection->user_id;
		$opposite->meta_connection_status_id       = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
		$opposite->meta_connection_relationship_id = $relationship_opposite;
		$opposite->save();

		// set to active
		$this_connection->meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED;
		$this_connection->updateUniques();

		// make notification to that user
		$notification->user_id                   = $this_connection->user_id;
		$notification->origin                    = "app/models/UserConnection.php:" . __LINE__;
		$notification->title                     = trans('general.connection_accepted');
		$notification->body                      = trans('general.connection_body_5', ['name' => $opposite->user->full_name,
																					   'relationship' => $opposite->metaConnectionRelationship->name]);
		$notification->meta_notification_type_id = MetaNotificationType::NOTIFICATION_TYPE_CONNECTION;
		$notification->sent                      = DB::raw('NOW()');
		$notification->save();

	}

	/**
	 * Process a rejected connection request
	 *
	 * @param $request_id
	 */
	public function reject($request_id)
	{
		$this_connection = $this->find($request_id);

		// set to rejected
		$this_connection->meta_connection_status_id = MetaConnectionStatus::CONNECTION_STATUS_REJECTED;
		$this_connection->updateUniques();
	}

	/**
	 * Gets the user's downline
	 *
	 * @param $user_id
	 *
	 * @return mixed
	 */
	public function getConnectedDownline($user_id)
	{
		return $this
			->where('user_id', '=', $user_id)
			->where('meta_connection_relationship_id', '=', MetaConnectionRelationship::CONNECTION_RELATIONSHIP_DOWNLINE)
			->with(['connectionUser',
					'connectionUser.userProfile' =>
						function($query){$query->where('meta_profile_type_id',
													   '=',
													   MetaProfileType::PROFILE_FIELD_ABOUT_ME);},
					'metaConnectionRelationship',
					'metaConnectionStatus'])
			->get();
	}

	/**
	 * Gets the user's upline
	 *
	 * @param $user_id
	 *
	 * @return mixed
	 */
	public function getConnectedUpline($user_id)
	{
		return $this
			->where('user_id', '=', $user_id)
			->where('meta_connection_relationship_id', '=', MetaConnectionRelationship::CONNECTION_RELATIONSHIP_UPLINE)
			->with(['connectionUser',
					'connectionUser.userProfile' =>
						function($query){$query->where('meta_profile_type_id',
													   '=',
													   MetaProfileType::PROFILE_FIELD_ABOUT_ME);},
					'metaConnectionRelationship',
					'metaConnectionStatus'])
			->get();
	}

	/**
	 * Gets the user's sponsor
	 *
	 * @param $user_id
	 *
	 * @return mixed
	 */
	public function getConnectedSponsor($user_id)
	{
		return $this
			->where('user_id', '=', $user_id)
			->where('meta_connection_relationship_id', '=', MetaConnectionRelationship::CONNECTION_RELATIONSHIP_SPONSOR)
			->with(['connectionUser',
				   'connectionUser.userProfile' =>
					   function($query){$query->where('meta_profile_type_id',
													  '=',
													  MetaProfileType::PROFILE_FIELD_ABOUT_ME);},
				   'metaConnectionRelationship',
				   'metaConnectionStatus'])
			->get();
	}

	/**
	 * Gets a user connection record for a relationship
	 *
	 * @param $user_id
	 *
	 * @return mixed
	 */
	public function getConnectedUser($user_id)
	{
		return $this->where('connection_user_id', '=', $user_id)
					->where('user_id', '=', Auth::id())
					->with('connectionUser', 'metaConnectionRelationship')
					->get();

	}

	/**
	 * Gets the opposite connection
	 * If x is connected to y
	 * this gets the y->x connection
	 *
	 * @param $user_id
	 * @param $company_id
	 * @param $connection_user_id
	 *
	 * @return mixed
	 */
	private function _getOppositeconnection($user_id, $company_id, $connection_user_id)
	{
		return $this
			->where('user_id', '=', $connection_user_id)
			->where('company_id', '=', $company_id)
			->where('connection_user_id', '=', $user_id)
			->with('user', 'metaConnectionRelationship')
			->first();
	}


}