<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaBillingItemStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaBillingItemStatus whereOrdinal($value)
 * @property-read \CompanyBillingItem $companyBillingItem
 * @property-read \UserBillingItem $userBillingItem
 */
class MetaBillingItemStatus extends Ardent {
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