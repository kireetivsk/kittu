<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaUserStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \User $user
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereOrdinal($value)
 */
class MetaUserStatus extends Ardent {
	protected $fillable = [];

	const PENDING 		= 1;
	const ACTIVE 		= 2;
	const INACTIVE 		= 3;
	const SUSPENDED 	= 4;
	const DELETED 		= 5;

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

}