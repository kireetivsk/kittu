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
}