<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaSocialNetwork
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereOrdinal($value)
 * @property-read \CrmPersonSocial $crmPersonSocial
 */
class MetaSocialNetwork extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function crmPersonSocial()
	{
		return $this->hasOne('CrmPersonSocial');
	}
}