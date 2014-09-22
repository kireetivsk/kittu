<?php

/**
 * MetaCompanyStatus
 *
 */
class MetaCompanyStatus extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function comapny()
	{
		return $this->belongsTo('Company');
	}
}