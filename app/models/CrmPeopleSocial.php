<?php

/**
 * CrmPeopleSocial
 *
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaSocialType $metaSocialType
 */
class CrmPeopleSocial extends \Eloquent {
	protected $fillable = [];

		//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

	public function metaSocialType()
	{
		return $this->hasOne('MetaSocialType');
	}

}