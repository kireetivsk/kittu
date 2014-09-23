<?php
	use LaravelBook\Ardent\Ardent;

/**
 * CompanyCategory
 *
 * @property integer $id
 * @property string $name
 * @property boolean $active
 * @method static \Illuminate\Database\Query\Builder|\CompanyCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyCategory whereActive($value)
 * @property-read \Company $company
 */
class CompanyCategory extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' => 'required|max:45'
	];

	//relationships
	public function company()
	{
		return $this->belongsTo('Company');
	}

	//map static meta data to save queries
	const USER_SUBMITTED = 1;
}