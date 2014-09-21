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
 */
class UserBillingItem extends \Eloquent {
	protected $fillable = [];
}