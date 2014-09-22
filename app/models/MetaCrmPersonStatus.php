<?php

/**
 * MetaCrmPeopleStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleStatus whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleStatus whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleStatus whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleStatus whereOrdinal($value) 
 */
class MetaCrmPersonStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}


}