<?php

/**
 * MetaConnectionRelationships
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \UserConnection $userConnection
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationships whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationships whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationships whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationships whereOrdinal($value)
 */
class MetaConnectionRelationships extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userConnection()
	{
		return $this->belongsTo('UserConnection');
	}


}