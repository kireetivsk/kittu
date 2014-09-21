<?php

/**
 * MetaUserStatus
 *
 * @property integer $int
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \User $user
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereInt($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaUserStatus whereOrdinal($value) 
 */
class MetaUserStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

}