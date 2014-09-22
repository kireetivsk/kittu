<?php

/**
 * MetaCrmPeopleType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonType whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonType whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonType whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonType whereOrdinal($value) 
 */
class MetaCrmPersonType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}


}