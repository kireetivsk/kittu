<?php

/**
 * UserBillingTransaction
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $billing_item_id
 * @property float $amount
 * @property integer $meta_billing_status_id
 * @property integer $user_payment_profile_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereBillingItemId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereAmount($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereMetaBillingStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereUserPaymentProfileId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserBillingTransaction whereDeletedAt($value) 
 */
class UserBillingTransaction extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userPaymentProfile()
	{
		return $this->hasOne('UserPaymentProfile');
	}

	public function billingItem()
	{
		return $this->hasOne('bilingItem');
	}

	public function metaBillingStatus()
	{
		return $this->hasOne('MetaBillingStatus');
	}

	public function user()
	{
		return $this->hasOne('User');
	}

}