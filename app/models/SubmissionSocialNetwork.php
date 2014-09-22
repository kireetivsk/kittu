<?php

/**
 * SubmissionSocialNetwork
 *
 * @property integer $id
 * @property string $name
 * @property string $website
 * @method static \Illuminate\Database\Query\Builder|\SubmissionSocialNetwork whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SubmissionSocialNetwork whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\SubmissionSocialNetwork whereWebsite($value)
 */
class SubmissionSocialNetwork extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:100',
		'website'			=> 'required|max:254|url'
	];


}