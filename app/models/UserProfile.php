<?php
	use LaravelBook\Ardent\Ardent;

/**
 * UserProfile
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $meta_profile_type_id
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \MetaProfileType $metaProfileType
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereMetaProfileTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserProfile whereDeletedAt($value)
 * @property-read \User $user
 */
class UserProfile extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 				=> 'required|integer',
		'meta_profile_type_id' 	=> 'required|integer',
		'value' 				=> 'required|max:100'
	];

	//relationships
	public function metaProfileType()
	{
		return $this->belongsTo('MetaProfileType');
	}

	public function user()
	{
		return$this->belongsTo('User');
	}

	//public functions

	public function set($user_id, $setting_id, $value)
	{
		$table_name = $this->getTable();
		$sql = "INSERT INTO $table_name
				(user_id, meta_profile_type_id, value, created_at)
				VALUES ($user_id, $setting_id, '$value', NOW())
				ON DUPLICATE KEY UPDATE value = '$value', updated_at = NOW()";
		DB::statement($sql);
	}

	public function getConsultantProfile($user_id)
	{
		//get profile fields
		$new_profile = [];
		$new_fields = [];

		$profile_types = new MetaProfileType();
		$fields = $profile_types->where('profile_type', '=', MetaProfileType::PROFILE_TYPE_CONSULTANT)->get()->toArray();
		//remap array
		foreach ($fields as $value){
			$new_fields[$value['slug']] = $value;
		}

		//get profile values
		$profile = $this->with('metaProfileType')->whereUserId($user_id)->get()->toArray();
		foreach ($profile as $value){
			$new_profile[$value['meta_profile_type']['slug']] = $value;
		}

		return ['fields'=> $new_fields, 'profile'=>$new_profile];
	}

}