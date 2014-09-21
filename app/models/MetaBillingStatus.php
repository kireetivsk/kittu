<?php

class MetaBillingStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function companyBillingTransactions()
	{
		return $this->belongsTo('CompanyBillingTransaction');
	}

	public function userBillingTransactions()
	{
		return $this->belongsTo('UserBillingTransaction');
	}
}