<?php

/**
 * CompanyPaymentProfile
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $merchant_customer_id
 * @property integer $meta_payment_profile_status_id
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereCompanyId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereMerchantCustomerId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereMetaPaymentProfileStatusId($value) 
 */
class CompanyPaymentProfile extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function company()
	{
		return $this->hasOne('Company');
	}

	public function metaPaymentProfileStatus()
	{
		return $this->hasOne('MetaPaymentProfileStatus');
	}

	public function companyBillingTransaction()
	{
		return $this->belongsTo('CompanyBillingTransaction');
	}

	public function companyBillingItem()
	{
		return $this->belongsTo('companyBillingItem');
	}


}