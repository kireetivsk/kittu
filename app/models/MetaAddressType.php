<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaAddressTypes
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaAddressType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaAddressType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaAddressType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaAddressType whereOrdinal($value)
 * @property-read \CrmPersonAddress $crmPersonAddress
 */
class MetaAddressType extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function crmPersonAddress()
	{
		return $this->belongsTo('CrmPersonAddress');
	}
}