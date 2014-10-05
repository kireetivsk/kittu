<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaCrmPeopleStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaCrmPersonStatus whereOrdinal($value)
 */
class MetaCrmPersonStatus extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function crmPerson()
	{
		return $this->hasOne('CrmPerson');
	}


}