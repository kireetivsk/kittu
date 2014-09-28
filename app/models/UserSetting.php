<?php
	use LaravelBook\Ardent\Ardent;

/**
 * UserSetting
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $meta_setting_type_id
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereMetaSettingTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \MetaSettingType $metaSettingType
 */
class UserSetting extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 				=> 'required|integer',
		'meta_setting_type_id' 	=> 'required|integer',
		'value' 				=> 'required|max:100'
	];

	//relationships
	public function user()
	{
		return $this->hasOne('User');
	}

	public function metaSettingType()
	{
		return $this->hasOne('MetaSettingType');
	}

	//constants
	const CATEGORY_LAST_SELECTED_COMPANY = 1;
	const CATEGORY_CONNECTION_PERMISSION = 2;

	public $default_settings = [
		/**
		 * This is the setting that dictates how incoming connection requests are handled
		 * verify_all
		 * 		default - all requests must ne manually approved
		 * verify_upline
		 * 		all down line requests are automatically approved, only upline needs to be approved.
		 * verify_downline
		 * 		all upline requests are automatically approved, downline needs to be approved manually
		 * approve_all
		 * 		all requests are automatically approved.
		 */
		'2' => 'verify_all'
	];


	//public functions

	/**
	 * Sets a setting
	 * If it already exists, it updates its value
	 *
	 * @param int $user_id
	 * @param int $setting_id
	 * @param string $value
	 */
	public function set($user_id, $setting_id, $value)
	{
		$table_name = $this->getTable();
		$sql = "INSERT INTO $table_name
				(user_id, meta_setting_type_id, value)
				VALUES ($user_id, $setting_id, '$value')
				ON DUPLICATE KEY UPDATE value = '$value'";
		DB::statement($sql);
	}

	/**
	 * Sets default values for all defined settings in $this->default_settings
	 *
	 * @param int $user_id
	 */
	public function setDefaults($user_id)
	{
		foreach ($this->default_settings as $key => $value)
		{
			$this->set($user_id, $key, $value);
		}
	}


}