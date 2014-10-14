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
		return $this->hasMany('MetaProfileType');
	}

	public function user()
	{
		return$this->belongsTo('User');
	}

	//public functions

	public function getConsultantProfile($user_id)
	{
		//get profile fields
		$profile_types = new MetaProfileType();
		$fields = $profile_types->where('profile_type', '=', MetaProfileType::PROFILE_TYPE_CONSULTANT)->get()->toArray();
		//remap array
		foreach ($fields as $value){
			$new_fields[$value['name']] = $value;
		}

		//get profile values
		$profile = $this->with('metaProfiletype')->whereUserId($user_id)->get()->toArray();

		return ['fields'=> $fields, 'profile'=>$profile];
	}

}