<?php

/**
 * MetaPaymentProfileStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \CompanyPaymentProfile $companyPaymentProfile
 * @property-read \UserPaymentProfile $userPaymentProfile
 * @method static \Illuminate\Database\Query\Builder|\MetaPaymentProfileStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaPaymentProfileStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaPaymentProfileStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaPaymentProfileStatus whereOrdinal($value)
 */
class MetaPaymentProfileStatus extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function companyPaymentProfile()
	{
		return $this->belongsTo('CompanyPaymentProfile');
	}

	public function userPaymentProfile()
	{
		return $this->hasOne('UserPaymentProfile');
	}


}