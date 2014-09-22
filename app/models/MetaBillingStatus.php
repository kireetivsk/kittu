<?php

/**
 * MetaBillingStatus
 *
 * @property integer $int
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