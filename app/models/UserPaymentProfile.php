<?php

/**
 * UserPaymentProfile
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $merchant_customer_id
 * @property integer $meta_payment_profile_status_id
 * @method static \Illuminate\Database\Query\Builder|\UserPaymentProfile whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserPaymentProfile whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserPaymentProfile whereMerchantCustomerId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserPaymentProfile whereMetaPaymentProfileStatusId($value) 
 */
class UserPaymentProfile extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->hasOne('User');
	}

	public function metaPaymentProfileStatus()
	{
		return $this->hasOne('MetaPaymentProfileStatus');
	}

	public function userBillingItem()
	{
		return $this->belongsTo('MetaPaymentProfileStatus');
	}

	public function userBillingTransaction()
	{
		return $this->belongsTo('UserBillingTransaction');
	}


}