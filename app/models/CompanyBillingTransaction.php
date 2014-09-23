<?php
	use LaravelBook\Ardent\Ardent;

/**
 * CompanyBillingTransaction
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $billing_item_id
 * @property float $amount
 * @property integer $meta_billing_status_id
 * @property integer $company_payment_profile_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereBillingItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereMetaBillingStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereCompanyPaymentProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereDeletedAt($value)
 * @property-read \CompanyPaymentProfile $companyPaymentProfile
 * @property-read \billingItem $billingItem
 * @property-read \MetaBillingStatus $metaBillingStatus
 * @property-read \Company $company
 */
class CompanyBillingTransaction extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'company_id'                => 'required|integer',
		'billing_item_id'           => 'required|integer',
		'amount'              		=> 'required|numeric|max:11',
		'meta_billing_status_id' 	=> 'required|integer',
		'company_payment_profile_id'=> 'required|integer'
	];



	//relationships
	public function companyPaymentProfile()
	{
		return $this->hasOne('CompanyPaymentProfile');
	}

	public function billingItem()
	{
		return $this->hasOne('billingItem');
	}

	public function metaBillingStatus()
	{
		return $this->hasOne('MetaBillingStatus');
	}

	public function company()
	{
		return $this->hasOne('Company');
	}


}