<?php
	use LaravelBook\Ardent\Ardent;

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
 * @property-read \UserPaymentProfile $userPaymentProfile
 * @property-read \BillingItem $billingItem
 * @property-read \MetaBillingStatus $metaBillingStatus
 * @property-read \User $user
 */
class UserBillingTransaction extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 						=> 'required|integer',
		'billing_item_id' 				=> 'required|integer',
		'amount' 						=> 'required|numeric',
		'meta_billing_status_id' 		=> 'required|integer',
		'user_payment_profile_id' 		=> 'required|integer'
	];

	//relationships
	public function userPaymentProfile()
	{
		return $this->belongsTo('UserPaymentProfile');
	}

	public function billingItem()
	{
		return $this->belongsTo('BillingItem');
	}

	public function metaBillingStatus()
	{
		return $this->belongsTo('MetaBillingStatus');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

}