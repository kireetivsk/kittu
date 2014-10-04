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
 * @property-read \UserCompanyMap $userCompanyMap
 * @property-read \UserBillingTransaction $userBillingTransaction
 * @property-read \UserPaymentProfile $userPaymentProfile
 * @property-read \UserProfile $userProfile
 * @property-read \UserConnection $userConnection
 * @property-read \Illuminate\Database\Eloquent\Collection|\Company[] $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\ConnectionRequest[] $connectionRequest
 * @property string $remember_token
 * @method static \Illuminate\Database\Query\Builder|\User whereRememberToken($value)
 */
class User extends Ardent implements UserInterface, RemindableInterface {
	protected $fillable = [
		'new_email_key',
        'remember_token'
	];

    protected $hidden = array(
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
        'deleted_at',
    );

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
	public function metaUserStatus()
	{
		return $this->hasOne('MetaUserStatus');
	}

	public function metaUserType()
	{
		return $this->hasOne('MetaUserType');
	}

	public function lead()
	{
		return $this->hasMany('Lead');
	}

	public function toMessage()
	{
		return $this->hasMany('Message', 'to_user');
	}

	public function fromMessage()
	{
		return $this->hasMany('Message', 'from_user');
	}

	public function messageFolder()
	{
		return $this->hasMany('MessageFolder');
	}

	public function qnaComment()
	{
		return $this->hasMany('QnaComment');
	}

	public function qnaAnswer()
	{
		return $this->hasMany('QnaAnswer');
	}

	public function qnaQuestion()
	{
		return $this->hasMany('QnaQuestion');
	}

	public function qnaRepTransaction()
	{
		return $this->hasMany('QnaRepTransaction');
	}

	public function crmPerson()
	{
		return $this->hasMany('CrmPerson');
	}

	public function userSetting()
	{
		return $this->hasMany('UserSetting');
	}

	public function discussionCategory()
	{
		return $this->belongsTo('DiscussionCategory');
	}

	public function discussionTopic()
	{
		return $this->belongsTo('DiscussionTopic');
	}

	public function discussionPost()
	{
		return $this->belongsTo('DiscussionPost');
	}

	public function discussionView()
	{
		return $this->belongsTo('DiscussionView');
	}

	public function discussionComment()
	{
		return $this->belongsTo('DiscussionComment');
	}

	public function discussionFollow()
	{
		return $this->belongsTo('DiscussionFollow');
	}

	public function discussionFolder()
	{
		return $this->hasMany('DiscussionFolder');
	}

	public function userCompanyMap()
	{
		return $this->hasMany('UserCompanyMap');
	}

	public function userBillingTransaction()
	{
		return $this->belongsTo('UserBillingTransaction');
	}

	public function userPaymentProfile()
	{
		return $this->belongsTo('UserPaymentProfile');
	}

	public function userProfile()
	{
		return $this->belongsTo('UserProfile');
	}

	public function userConnection()
	{
		return $this->belongsTo('UserConnection');
	}

	public function company()
	{
		return $this->belongsToMany('Company');
	}

	public function connectionRequest()
	{
		return $this->hasMany('ConnectionRequest');
	}

	//accessors and mutators
//	public function setNewEmailKeyAttribute($value)
//	{
//		$this->attributes['new_email_key'] = $value ? $value : NULL;
//	}

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

    public function getUserPublicData($user_id)
    {
		$user = $this->find($user_id)->toArray();
		$user['full_name'] = $user['first_name'] . " " . $user['last_name'];
        return $user;
    }
}