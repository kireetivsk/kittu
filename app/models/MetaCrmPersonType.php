<?php

/**
 * MetaCrmPeopleType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleType whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleType whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleType whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPeopleType whereOrdinal($value) 
 */
class MetaCrmPersonType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}


}