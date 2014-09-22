<?php

/**
 * UserCompanyMap
 *
 * @property-read \Company $company
 * @property-read \MetaUserCompanyStatus $metaUserCompanyStatus
 * @property-read \User $user
 * @property-read \UserConnection $userConnection
 */
class UserCompanyMap extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 						=> 'required|integer',
		'company_id' 					=> 'required|integer',
		'meta_user_comapny_status_id' 	=> 'integer'

	];

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
		return $this->belongsTo('UserConnection');
	}


}