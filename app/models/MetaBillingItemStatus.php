<?php

/**
 * MetaBillingItemStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereInt($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereOrdinal($value)
 */
class MetaBillingItemStatus extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function companyBillingItem()
	{
		return $this->belongsTo('CompanyBillingItem');
	}

	public function userBillingItem()
	{
		return $this->belongsTo('UserBillingItem');
	}

}