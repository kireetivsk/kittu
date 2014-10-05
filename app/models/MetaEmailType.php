<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaEmailType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaEmailType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaEmailType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaEmailType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaEmailType whereOrdinal($value)
 * @property-read \CrmPersonEmail $crmPersonEmail
 */
class MetaEmailType extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//validation
	public function crmPersonEmail()
	{
		return $this->hasOne('CrmPersonEmail');
	}
}