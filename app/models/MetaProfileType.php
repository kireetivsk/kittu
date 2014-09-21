<?php

class MetaProfileType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function metaProfileCategory()
	{
		return $this->hasOne('MetaProfileCategory');
	}

	public function companyProfileType()
	{
		return $this->belongsTo('CompanyProfileType');
	}

	public function userProfileType()
	{
		return $this->belongsTo('UserProfileType');
	}


}