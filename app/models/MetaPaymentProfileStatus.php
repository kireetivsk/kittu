<?php

class MetaPaymentProfileStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function companyPaymentProfile()
	{
		return $this->belongsTo('CompanyPaymentProfile');
	}

	public function userPaymentProfile()
	{
		return $this->hasOne('UserPaymentProfile');
	}


}