<?php

/**
 * UserBillingItem
 *
 * @property integer $id
 * @property integer $billing_item_id
 * @property integer $payment_profile_id
 * @property integer $meta_billing_item_status_id
 * @method static \Illuminate\Database\Query\Builder|\UserBillingItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserBillingItem whereBillingItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserBillingItem wherePaymentProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserBillingItem whereMetaBillingItemStatusId($value)
 * @property integer $user_payment_profile_id
 * @property-read \BillingItem $billingItem
 * @property-read \UserPaymentProfile $userPaymentProfile
 * @property-read \MetaBillingItemStatus $metaBillingItemStatus
 * @method static \Illuminate\Database\Query\Builder|\UserBillingItem whereUserPaymentProfileId($value) 
 */
class UserBillingItem extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function billingItem()
	{
		return $this->hasOne('BillingItem');
	}

	public function userPaymentProfile()
	{
		return $this->hasOne('UserPaymentProfile');
	}

	public function metaBillingItemStatus()
	{
		return $this->hasOne('MetaBillingItemStatus');
	}


}