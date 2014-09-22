<?php

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
class MetaUserStatus extends \Eloquent {
	protected $fillable = [];

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