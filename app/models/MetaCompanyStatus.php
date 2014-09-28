<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaCompanyStatus
 *
 * @property-read \Company $company
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaCompanyStatus whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCompanyStatus whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCompanyStatus whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\MetaCompanyStatus whereOrdinal($value) 
 */
class MetaCompanyStatus extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function company()
	{
		return $this->belongsTo('Company');
	}
}