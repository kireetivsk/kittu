<?php

/**
 * CompanyBillingItem
 *
 * @property integer $id
 * @property integer $billing_item_id
 * @property integer $payment_profile_id
 * @property integer $meta_billing_item_status_id
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingItem whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingItem whereBillingItemId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingItem wherePaymentProfileId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingItem whereMetaBillingItemStatusId($value) 
 */
class CompanyBillingItem extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function billingItem()
	{
		return $this->hasOne('BillingItem');
	}

	public function companyPaymentProfile()
	{
		return $this->hasOne('CompanyPaymentProfile');
	}

	public function metaBillingItemStatus()
	{
		return $this->hasOne('MetaBillingItemStatus');
	}

}