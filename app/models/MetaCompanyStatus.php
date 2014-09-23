<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaCompanyStatus
 *
 * @property-read \Company $company
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