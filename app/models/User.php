<?php
	use LaravelBook\Ardent\Ardent;
    use Illuminate\Auth\UserInterface;
    use Illuminate\Auth\Reminders\RemindableInterface;
/**
 * User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $first_name
 * @property string $last_name
 * @property string $new_password_key
 * @property string $new_password_requested
 * @property string $new_email
 * @property string $new_email_key
 * @property string $last_ip
 * @property string $last_login
 * @property integer $meta_user_status_id
 * @property integer $meta_user_type_id
 * @property boolean $stripe_active
 * @property string $stripe_id
 * @property string $stripe_subscription
 * @property string $stripe_plan
 * @property string $last_four
 * @property string $trial_ends_at
 * @property string $subscription_ends_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereSalt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereNewPasswordKey($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereNewPasswordRequested($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereNewEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereNewEmailKey($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereLastIp($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereMetaUserStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereMetaUserTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereStripeActive($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereStripeId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereStripeSubscription($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereStripePlan($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereLastFour($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereSubscriptionEndsAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereDeletedAt($value)
 * @property-read \MetaUserStatus $metaUserStatus
 * @property-read \MetaUserType $metaUserType
 * @property-read \Illuminate\Database\Eloquent\Collection|\Lead[] $lead
 * @property-read \Illuminate\Database\Eloquent\Collection|\Message[] $toMessage
 * @property-read \Illuminate\Database\Eloquent\Collection|\Message[] $fromMessage
 * @property-read \Illuminate\Database\Eloquent\Collection|\MessageFolder[] $messageFolder
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaComment[] $qnaComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaAnswer[] $qnaAnswer
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaQuestion[] $qnaQuestion
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaRepTransaction[] $qnaRepTransaction
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPerson[] $crmPerson
 * @property-read \Illuminate\Database\Eloquent\Collection|\UserSetting[] $userSetting
 * @property-read \DiscussionCategory $discussionCategory
 * @property-read \DiscussionTopic $discussionTopic
 * @property-read \DiscussionPost $discussionPost
 * @property-read \DiscussionView $discussionView
 * @property-read \DiscussionComment $discussionComment
 * @property-read \DiscussionFollow $discussionFollow
 * @property-read \Illuminate\Database\Eloquent\Collection|\DiscussionFolder[] $discussionFolder
 * @property-read \UserBillingTransaction $userBillingTransaction
 * @property-read \UserPaymentProfile $userPaymentProfile
 * @property-read \UserProfile $userProfile
 * @property-read \UserConnection $userConnection
 * @property-read \Illuminate\Database\Eloquent\Collection|\Company[] $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\ConnectionRequest[] $connectionRequest
 * @property string $remember_token
 * @method static \Illuminate\Database\Query\Builder|\User whereRememberToken($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Notification[] $notification
 * @property-read \Illuminate\Database\Eloquent\Collection|\UserConnection[] $userConnected
 * @property-read mixed $full_name
 */
class User extends Ardent implements UserInterface, RemindableInterface {
	protected $fillable = [
		'new_email_key',
        'remember_token'
	];

    protected $hidden = [
		'email',
		'username',
		'password',
		'last_four',
        'last_ip',
        'last_login',
        'new_password_key',
        'salt',
        'new_password_requested',
        'new_email',
        'new_email_key',
        'remember_token',
        'meta_user_status_id',
        'meta_user_type_id',
        'stripe_active',
        'stripe_id',
        'stripe_subscription',
        'stripe_plan',
        'trial_ends_at',
        'subscription_ends_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

	//validation
	public static $rules = [
		'username' 					=> 'required|max:255|unique:users',
		'email' 					=> 'required|max:255|email|unique:users',
		'password' 					=> 'required|between:6,100',
		'salt' 						=> 'max:100',
		'first_name' 				=> 'required|alpha_num|max:45',
		'last_name' 				=> 'required|alpha_num|max:45',
		'new_password_key' 			=> 'max:50',
		'new_password_requested' 	=> 'date_format:Y-m-d H:i:s',
		'new_email' 				=> 'max:100|email',
		'new_email_key' 			=> 'max:50',
		'last_ip' 					=> 'required|ip',
		'last_login' 				=> 'date_format:Y-m-d H:i:s',
		'meta_user_status_id' 		=> 'integer',
		'meta_user_type_id' 		=> 'integer',
		'stripe_active' 			=> 'integer',
		'stripe_id' 				=> 'max:255',
		'stripe_subscription' 		=> 'max:255',
		'stripe_plan' 				=> 'max:25',
		'last_four' 				=> 'max:4',
		'trial_ends_at' 			=> 'date_format:Y-m-d H:i:s',
		'subscription_ends_at' 		=> 'date_format:Y-m-d H:i:s'
	];

	//relationships

	//belongs to
	public function metaUserStatus()
	{
		return $this->belongsTo('MetaUserStatus');
	}

	public function metaUserType()
	{
		return $this->belongsTo('MetaUserType');
	}

	//belongsToMany
	public function company()
	{
		return $this->belongsToMany('Company')->withPivot('id', 'meta_user_company_status_id')->withTimestamps();
	}

	//hasMany
	public function crmPerson()
	{
		return $this->hasMany('CrmPerson');
	}

	public function discussionCategory()
	{
		return $this->hasMany('DiscussionCategory');
	}

	public function discussionComment()
	{
		return $this->hasMany('DiscussionComment');
	}

	public function discussionFollow()
	{
		return $this->hasMany('DiscussionFollow');
	}

	public function discussionFolder()
	{
		return $this->hasMany('DiscussionFolder');
	}

	public function discussionPost()
	{
		return $this->hasMany('DiscussionPost');
	}

	public function discussionTopic()
	{
		return $this->hasMany('DiscussionTopic');
	}

	public function discussionView()
	{
		return $this->hasMany('DiscussionView');
	}

	public function lead()
	{
		return $this->hasMany('Lead');
	}

	public function toMessage()
	{
		return $this->hasMany('Message', 'id', 'to_user');
	}

	public function fromMessage()
	{
		return $this->hasMany('Message', 'id', 'from_user');
	}

	public function messageFolder()
	{
		return $this->hasMany('MessageFolder');
	}

	public function notification()
	{
		return $this->hasMany('Notification');
	}

	public function qnaAnswer()
	{
		return $this->hasMany('QnaAnswer');
	}

	public function qnaComment()
	{
		return $this->hasMany('QnaComment');
	}

	public function qnaQuestion()
	{
		return $this->hasMany('QnaQuestion');
	}

	public function qnaRepTransaction()
	{
		return $this->hasMany('QnaRepTransaction');
	}

	public function userConnection()
	{
		return $this->hasMany('UserConnection');
	}

	public function userConnected()
	{
		return $this->hasMany('UserConnection', 'id', 'connection_user_id');
	}

	public function connectionRequest()
	{
		return $this->hasMany('ConnectionRequest');
	}

	public function userBillingTransaction()
	{
		return $this->hasMany('UserBillingTransaction');
	}

	public function userPaymentProfile()
	{
		return $this->hasOne('UserPaymentProfile');
	}

	public function userSetting()
	{
		return $this->hasMany('UserSetting');
	}

	// hasOne
	public function userProfile()
	{
		return $this->hasMany('UserProfile');
	}

	//accessors and mutators
	public function getFullNameAttribute()
	{
		return $this->first_name . " " . $this->last_name;
	}
	//public methods

	/**
	 * Wrapper for new registration functionality
	 *
	 * @param array $params
	 * @return int
	 */
	public function consultantRegistration($params)
	{
		//create user
		if (!$this->createNewConsultantUser($params))
			return FALSE;

		//add company association
		$this->company()->attach($params['company_id']);

		//set setting for this company
		$user_setting = new UserSetting();
		$user_setting->set($this->id,
						 UserSetting::CATEGORY_LAST_SELECTED_COMPANY,
						 $params['company_id']);

		//set default settings
		$user_setting->setDefaults($this->id);

		return $this->id;
	}

	/**
	 * Creates new consultant user record
	 *
	 * @param array $params
	 * @return int
	 */
	public function createNewConsultantUser($params)
	{
		$this->username 			= $params['email'];
		$this->email 				= $params['email'];
		$this->password 			= Hash::make($params['password']);
		$this->first_name			= $params['first_name'];
		$this->last_name			= $params['last_name'];
		$this->new_email_key		= Dsk::generateCode(32);
		$this->last_ip				= Request::getClientIp();
		if ($this->validate())
		{
			$this->save();
			//send activation email
			$this->sendActivationEmail();

			return $this->id;
		}
	}

	/**
	 * sends activation email
	 */
	public function sendActivationEmail()
	{
		$views = [
			'emails.activation.html',
			'emails.activation.text'
		];

		$data = [
			'url' => url('activation/' . $this->id . DS . $this->new_email_key)
		];

		$callback = function($message){
			$message
				->from(REGISTRATION_EMAIL, SITE_NAME . 'Activations')
				->to($this->email, $this->first_name . " " . $this->last_name)
				->subject(trans('email.activation_subject'));
		};

		Mail::send($views, $data, $callback);
	}

	/**
	 * Checks an activation code and then activates the account
	 *
	 * @param $user_id
	 * @param $key
	 * @return bool
	 */
	public function activate($user_id, $key)
	{
		$user = User::
			where('new_email_key', '=', $key)
			->where('meta_user_status_id', '=', MetaUserStatus::PENDING)
			->where('id', '=', $user_id)
			->first();
		if (!$user)
			return FALSE;

		$user->meta_user_status_id = MetaUserStatus::ACTIVE;
		$user->new_email_key = DB::raw('NULL');
		$user->updateUniques();
		return TRUE;
	}

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $token = Dsk::generateCode(50);
        $this->remember_token = $token;
        $this->save();
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return "remember_token";
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Gets the users settings
     *
     * @param $user_id
     * @return mixed
     */
    public function getSettings($user_id)
    {
        $user = $this->with(['userSetting', 'userSetting.metaSettingType.metaSettingCategory'])->find($user_id);
		$settings = [];
        foreach ($user->userSetting as $key => $value)
        {
            $settings[$value->meta_setting_type_id]['id']           = $value->id;
            $settings[$value->meta_setting_type_id]['name']         = $value->metaSettingType->name;
            $settings[$value->meta_setting_type_id]['slug']         = $value->metaSettingType->slug;
            $settings[$value->meta_setting_type_id]['category']     = $value->metaSettingType->metaSettingCategory->name;
            $settings[$value->meta_setting_type_id]['value']        = $value->value;
        }
        return $settings;
    }

	/**
	 * Get public info on a user
	 *
	 * @param $user_id
	 * @return array
	 */
	public function getUserPublicData($user_id)
	{
		$user_profile 		= new UserProfile();
		$user 				= $this->find($user_id)->toArray();
		$user['full_name'] 	= $user['first_name'] . " " . $user['last_name'];
		$avatar 			= $user_profile->getAvatar($user_id);
		$user['avatar'] 	= $user_profile->getAvatarUrl($avatar);
		return $user;
	}

	public function deleteCompanyConnection($user_id, $company_id)
	{
		//connections
		$user_connection = UserConnection::
			orWhere(function ($query) use($user_id, $company_id)
				{
					$query->where('user_id', '=', $user_id)
						->where('company_id', '=', $company_id);
				})
			->orWhere(function ($query) use($user_id, $company_id)
				{
					$query->where('connection_user_id', '=', $user_id)
						  ->where('company_id', '=', $company_id);
				})
			->with('userConnectionNote')
			->get();
		//connection notes
		foreach($user_connection as $key => &$value)
		{
			foreach($value->userConnectionNote as $note)
			{
				$note->delete();
			}
			$value->delete();
		}
		//company user
//		$pivot = $this->find($user_id)->company()->where('company_id', '=', $company_id)->delete();
		User::find($user_id)->company()->detach($company_id);
	}

	public function getDiscussions()
	{
		$discussion_category 	= new DiscussionCategory();
		$discussion_view 		= new DiscussionView();
		$last_view_data			= $discussion_view->whereUserId(Auth::id())->first(['updated_at']);
		if (is_null($last_view_data))
			$last_view = Carbon\Carbon::now();
		else
			$last_view = $last_view_data->updated_at;
		//get my discussions
		$mine = $discussion_category->getMyDiscussions($last_view);

		//get upline discussions
		$upline = $discussion_category->getUplineDiscussions(Auth::id(), $last_view);

		//get downline discussions
		$downline = $discussion_category->getDownlineDiscussions(Auth::id(), $last_view);

		return [
			'mine' => $mine->toArray(),
			'upline' => $upline,
			'downline' => $downline
		];

	}

	public function getUpline($user_id, $list = [])
	{
		$upline = [];
		$user_connection = new UserConnection();
		$results = $user_connection
			->where('meta_connection_relationship_id', '=',  MetaConnectionRelationship::CONNECTION_RELATIONSHIP_DOWNLINE)
			->where('connection_user_id', '=', $user_id)
			->where('meta_connection_status_id', '=', MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED)
			->get();

		foreach($results as $value)
		{
			if (in_array($value->user_id, $list) || $value->user_id == Auth::id())
				continue;
			$upline[] = $value->user_id;
			// only direct connections.....
			//$list[] = $value->user_id;
			//$recurse = $this->getUpline($value->user_id, $list);
			//if (!empty($recurse)) {
			//	foreach ($recurse as $upupline) {
			//		$upline[] = $upupline;
			//	}
			//}
		}
		return $upline;
	}

	public function getDownline($user_id, $list = [])
	{
		$downline = [];
		$user_connection = new UserConnection();
		$results = $user_connection
			->where(
				function ($query) use($user_id)
				{
					$query
						->orWhere('meta_connection_relationship_id', '=',  MetaConnectionRelationship::CONNECTION_RELATIONSHIP_SPONSOR)
						->orWhere('meta_connection_relationship_id', '=',  MetaConnectionRelationship::CONNECTION_RELATIONSHIP_UPLINE);
				}
			)
			->where('connection_user_id', '=', $user_id)
			->where('meta_connection_status_id', '=', MetaConnectionStatus::CONNECTION_STATUS_ACCEPTED)
			->get();

		foreach($results as $value)
		{
			if (in_array($value->user_id, $list) || $value->user_id == Auth::id())
				continue;
			$downline[] = $value->user_id;
			// only direct connections.....
			//$list[] = $value->user_id;
			//$recurse = $this->getUpline($value->user_id, $list);
			//if (!empty($recurse)) {
			//	foreach ($recurse as $downdownline) {
			//		$downline[] = $downdownline;
			//	}
			//}
		}
		return $downline;
	}
}