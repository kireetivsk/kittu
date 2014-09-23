<?php
	use LaravelBook\Ardent\Ardent;

/**
 * CompanyPaymentProfile
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $merchant_customer_id
 * @property integer $meta_payment_profile_status_id
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereMerchantCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyPaymentProfile whereMetaPaymentProfileStatusId($value)
 * @property-read \Company $company
 * @property-read \MetaPaymentProfileStatus $metaPaymentProfileStatus
 * @property-read \CompanyBillingTransaction $companyBillingTransaction
 * @property-read \companyBillingItem $companyBillingItem
 */
class CompanyPaymentProfile extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'company_id' 			=> 'required|integer',
		'merchant_customer_id' 	=> 'required|max:256'
	];

	//relationships
	public function company()
	{
		return $this->hasOne('Company');
	}

	public function metaPaymentProfileStatus()
	{
		return $this->hasOne('MetaPaymentProfileStatus');
	}

	public function companyBillingTransaction()
	{
		return $this->belongsTo('CompanyBillingTransaction');
	}

	public function companyBillingItem()
	{
		return $this->belongsTo('companyBillingItem');
	}


}