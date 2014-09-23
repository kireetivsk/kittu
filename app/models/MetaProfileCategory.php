<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaProfileCategory
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \MetaProfileType $metaProfileType
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileCategory whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileCategory whereOrdinal($value)
 */
class MetaProfileCategory extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function metaProfileType()
	{
		return $this->belongsTo('MetaProfileType');
	}

}