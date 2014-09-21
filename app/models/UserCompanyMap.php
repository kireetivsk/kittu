<?php

class UserCompanyMap extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function company()
	{
		return $this->hasOne('Company');
	}

	public function metaUserCompanyStatus()
	{
		return $this->hasOne('MetaUserCompanyStatus');
	}

	public function user()
	{
		return $this->hasOne('User');
	}

	public function userConnections()
	{
		return $this->belongsTo('UserConnections');
	}


}