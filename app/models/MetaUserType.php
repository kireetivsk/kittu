<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaUserType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \User $user
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereOrdinal($value)
 */
class MetaUserType extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function user()
	{
		return $this->hasOne('User');
	}
}