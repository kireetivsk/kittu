<?php

class MetaUserCompanyStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userCompanyMap()
	{
		return $this->belongsTo('userCompanyMap');
	}
}