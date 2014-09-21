<?php

/**
 * BillingItem
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $billing_frequency
 * @property boolean $active
 * @property string $start_time
 * @property string $end_time
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereBillingFrequency($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereStartTime($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereEndTime($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereDeletedAt($value)
 * @property-read \CompanyBillingItem $companyBillingItem
 * @property-read \CompanyBillingTransaction $companyBillingTransaction
 * @property-read \UserBillingItem $userBillingItem
 * @property-read \UserBillingTransaction $userBillingTransaction
 * @property-read \Illuminate\Database\Eloquent\Collection|\Products[] $product
 */
class BillingItem extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = array(
		'name'                  => 'required|between:1,45',
		'description'           => 'required|between:1,100',
		'price'              	=> 'required|numeric|between:1,11',
		'billing_frequency' 	=> 'required|in:monthly,one_time',
		'active' 				=> 'required|in:0,1',
		'end_time' 				=> 'date_format:Y-m-d H:i:s',
		'start_time' 			=> 'date_format:Y-m-d H:i:s'
	);

	// Relationships
	public function companyBillingItem()
	{
		return $this->belongsTo('CompanyBillingItem');
	}

	public function companyBillingTransaction()
	{
		return $this->belongsTo('CompanyBillingTransaction');
	}

	public function userBillingItem()
	{
		return $this->belongsTo('UserBillingItem');
	}

	public function userBillingTransaction()
	{
		return $this->belongsTo('UserBillingTransaction');
	}

	public function product()
	{
		return $this->belongsToMany('Products');
	}


}