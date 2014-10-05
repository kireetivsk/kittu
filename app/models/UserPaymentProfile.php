<?php
	use LaravelBook\Ardent\Ardent;

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
 * @property-read \User $user
 * @property-read \MetaPaymentProfileStatus $metaPaymentProfileStatus
 * @property-read \MetaPaymentProfileStatus $userBillingItem
 * @property-read \UserBillingTransaction $userBillingTransaction
 */
class UserPaymentProfile extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'merchant_customer_id' 				=> 'required|max:45',
		'meta_payment_profile_status_id' 	=> 'required|integer',
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function metaPaymentProfileStatus()
	{
		return $this->hasOne('MetaPaymentProfileStatus');
	}

	public function userBillingItem()
	{
		return $this->hasMany('MetaPaymentProfileStatus');
	}

	public function userBillingTransaction()
	{
		return $this->hasMany('UserBillingTransaction');
	}


}