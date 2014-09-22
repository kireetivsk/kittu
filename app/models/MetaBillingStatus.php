<?php

/**
 * MetaBillingStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \CompanyBillingTransaction $companyBillingTransactions
 * @property-read \UserBillingTransaction $userBillingTransactions
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingStatus whereInt($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingStatus whereOrdinal($value)
 */
class MetaBillingStatus extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function companyBillingTransactions()
	{
		return $this->belongsTo('CompanyBillingTransaction');
	}

	public function userBillingTransactions()
	{
		return $this->belongsTo('UserBillingTransaction');
	}
}