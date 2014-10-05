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

}