<?php
	use LaravelBook\Ardent\Ardent;

/**
 * SubmissionCompanyCategory
 *
 */
class SubmissionCompanyCategory extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:100'
	];


}