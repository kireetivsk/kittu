<?php
	use LaravelBook\Ardent\Ardent;

/**
 * ConnectionRequest
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 * @property integer $meta_connection_relationship_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereMetaConnectionRelationshipId($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereDeletedAt($value)
 * @property-read \User $user
 */
class ConnectionRequest extends Ardent
{
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'email' 							=> 'required|email',
		'meta_connection_relationship_id'	=> 'required|integer'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function metaConnectionRelationship()
	{
		return $this->belongsTo('MetaConnectionRelationship');
	}

	//public functions

	public function connect($email, $relationship, $name)
	{
		$company = Session::get('userdata.current.company');
		$connection = new UserConnection();

		//find out if user is already registered
		$that_user = User::whereEmail($email)
			->with('userSetting', 'userSetting.metaSettingType', 'userSetting.metaSettingType.metaSettingCategory')
			->first();

		if (!empty($that_user))
		{
			$connection->makeConnection($that_user, $relationship, $company);
		} else {
			$referral_data = [
				'email'   => $email,
				'company' => $company
			];
			$url = url('referral/' . urlencode(base64_encode(json_encode($referral_data))));

			$views = [
				'emails.connection_request.html',
				'emails.connection_request.text'
			];

			$mail_data = [
				'url' => $url,
				'name' => $name
			];

			$callback = function ($message) {
				$message
					->from(NOREPLY_EMAIL, SITE_NAME . " invite from $this->name")
					->to($this->email)
					->subject(trans('email.connection_request_subject', ['name'=> $this->name]));
			};

			$this->user_id 							= Auth::id();
			$this->email 							= $email;
			$this->meta_connection_relationship_id 	= MetaConnectionRelationship::$relationships[$relationship];
			$this->name								= $name;

			Mail::send($views, $mail_data, $callback);

			unset($this->name);

			$this->save();
		}
		return TRUE;
	}

}