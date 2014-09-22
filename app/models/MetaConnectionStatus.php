<?php

/**
 * MetaConnectionStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \UserConnection $userConnection
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereOrdinal($value)
 */
class MetaConnectionStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userConnection()
	{
		return $this->belongsTo('UserConnection');
	}


}