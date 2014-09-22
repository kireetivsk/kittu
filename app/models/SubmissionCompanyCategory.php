<?php

/**
 * SubmissionCompanyCategory
 *
 */
class SubmissionCompanyCategory extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:100'
	];


}