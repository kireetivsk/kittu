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
		return $this->belongsTo('User', 'id', 'connection_user_id');
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
			'origin'						=> "app/models/UserConnection.php:67",
			'title'					 		=> trans('general.connection_notification'),
			'body'					  		=> trans('general.connection_body_1', ['name' => $that_user_name, 'relationship' => $relationship]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION

		];
		$this_notification_requested = [
			'user_id'				   		=> $this_user['id'],
			'origin'						=> "app/models/UserConnection.php:67",
			'title'					 		=> trans('general.connection_request'),
			'body'					  		=> trans('general.connection_body_2', ['name' => $that_user_name, 'relationship' => $relationship]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION
		];

		$that_notification_accepted  = [
			'user_id'				   		=> $that_user->id,
			'origin' 						=> "app/models/UserConnection.php:67",
			'title'					 		=> trans('general.connection_notification'),
			'body'					  		=> trans('general.connection_body_3', ['name' => $this_user['full_name'], 'relationship' => $relationship_opposite]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION
		];
		$that_notification_requested = [
			'user_id'				   		=> $that_user->id,
			'origin' 						=> "app/models/UserConnection.php:67",
			'title'					 		=> trans('general.connection_request'),
			'body'					  		=> trans('general.connection_body_4', ['name' => $this_user['full_name'], 'relationship' => $relationship_opposite]),
			'meta_notification_type_id' 	=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION
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
		$this_data = [
			'user_id'						 	=> $this_user['id'],
			'company_id'				   		=> $company,
			'connection_user_id'				=> $that_user->id,
			'meta_connection_status_id'	   		=> $meta_connection_status_id,
			'meta_connection_relationship_id' 	=> MetaConnectionRelationship::$relationships[$relationship]
		];

		$that_data = [
			'user_id'							=> $that_user->id,
			'company_id'						=> $company,
			'connection_user_id'				=> $this_user['id'],
			'meta_connection_status_id'			=> $meta_connection_status_id,
			'meta_connection_relationship_id' 	=> MetaConnectionRelationship::$relationships[$relationship]
		];

		try
		{
			$this->insert($this_data);
			$this->insert($that_data);
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
			$this_data = [
				'user_id'							=> $user_id,
				'connection_user_id'				=> $referral->user_id,
				'company_id'			 			=> $company_id,
				'meta_connection_status_id'	   		=> MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED,
				'meta_connection_relationship_id' 	=> $relationship_opposite
			];

			$this_notification_accepted = [
				'user_id'				   			=> $user_id,
				'origin'							=> "app/models/UserConnection.php:179",
				'title'					 			=> trans('general.connection_notification'),
				'body'					  			=> trans('general.connection_body_1', ['name' => $that_user->full_name, 'relationship' => $relationship_name]),
				'meta_notification_type_id' 		=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION
			];

			//the user getting connected to
			$that_data = [
				'user_id'						 	=> $referral->user_id,
				'connection_user_id'			  	=> $user_id,
				'company_id'			 			=> $company_id,
				'meta_connection_status_id'	   		=> MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED,
				'meta_connection_relationship_id' 	=> $referral->meta_connection_relationship_id
			];

			$that_notification_accepted = [
				'user_id'				   			=> $referral->user_id,
				'origin'							=> "app/models/UserConnection.php:179",
				'title'					 			=> trans('general.connection_notification'),
				'body' 								=> trans('general.connection_body_5', ['name' => $this_user->full_name, 'relationship' => $relationship_opposite_name]),
				'meta_notification_type_id' 		=> MetaNotificationType::NOTIFICATION_TYPE_CONNECTION
			];

			try
			{
				$this->insert($this_data);
				$notification->insert($this_notification_accepted);
				$this->insert($that_data);
				$notification->insert($that_notification_accepted);

			} catch (Exception $e)
			{
				return FALSE;
			}
		}
	}

	public function getUserConnectionRequests($user_id, $company_id)
	{
		$connection_requests =  self::where("connection_user_id", '=', $user_id)
			->where('company_id', '=', $company_id)
			->where('meta_connection_status_id', '=', MetaConnectionStatus::CONNECTION_STATUS_REQUESTED)
			->with('metaConnectionStatus', 'metaConnectionRelationship', 'user')
			->get();
		$requests = Dsk::removeDuplicates($connection_requests, 'email');
		return $requests;
	}

}