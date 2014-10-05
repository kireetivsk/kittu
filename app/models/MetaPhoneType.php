<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaPhoneType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaPhoneType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaPhoneType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaPhoneType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaPhoneType whereOrdinal($value)
 * @property-read \CrmPersonPhone $crmPersonPhone
 */
class MetaPhoneType extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relatuionships
	public function crmPersonPhone()
	{
		return $this->hasOne('CrmPersonPhone');
	}
}