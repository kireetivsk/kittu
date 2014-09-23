<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaUserCompanyStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \userCompanyMap $userCompanyMap
 * @method static \Illuminate\Database\Query\Builder|\MetaUserCompanyStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserCompanyStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserCompanyStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaUserCompanyStatus whereOrdinal($value)
 */
class MetaUserCompanyStatus extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function userCompanyMap()
	{
		return $this->belongsTo('userCompanyMap');
	}
}