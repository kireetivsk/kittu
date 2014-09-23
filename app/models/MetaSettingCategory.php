<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaSettingCategory
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \MetaSettingType $metaSettingType
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingCategory whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingCategory whereOrdinal($value)
 */
class MetaSettingCategory extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function metaSettingType()
	{
		return $this->belongsTo('MetaSettingType');
	}

}