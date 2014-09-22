<?php

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
 */
class MetaPhoneType extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relatuionships
	public function cromPersonPhone()
	{
		return $this->belongsTo('CrmPersonPhone');
	}
}