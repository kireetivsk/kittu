<?php
	use LaravelBook\Ardent\Ardent;
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
 * @property integer $company_payment_profile_id
 * @property-read \BillingItem $billingItem
 * @property-read \CompanyPaymentProfile $companyPaymentProfile
 * @property-read \MetaBillingItemStatus $metaBillingItemStatus
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingItem whereCompanyPaymentProfileId($value)
 */
class CompanyBillingItem extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'billing_item_id'                  => 'required|integer',
		'company_payment_profile_id'       => 'required|integer',
		'meta_billing_item_status_id'      => 'required|integer;'
	];


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