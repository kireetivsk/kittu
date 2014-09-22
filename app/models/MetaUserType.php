<?php

/**
 * MetaUserType
 *
 * @property integer $int
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \User $user
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereInt($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserType whereOrdinal($value)
 */
class MetaUserType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}
}