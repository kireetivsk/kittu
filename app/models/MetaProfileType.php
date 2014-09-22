<?php

/**
 * MetaProfileType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $default_value
 * @property integer $meta_profile_category_id
 * @property string $profile_type
 * @property integer $ordinal
 * @property-read \MetaProfileCategory $metaProfileCategory
 * @property-read \CompanyProfile $companyProfile
 * @property-read \UserProfile $userProfile
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereDefaultValue($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereMetaProfileCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereProfileType($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProfileType whereOrdinal($value)
 */
class MetaProfileType extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 							=> 'required|max:45',
		'description' 					=> 'max:100',
		'default_value'					=> 'required|max:100',
		'meta_profile_category_id'		=> 'required|integer',
		'profile_type'					=> 'required|in:user,company'
	];

	//relationships
	public function metaProfileCategory()
	{
		return $this->hasOne('MetaProfileCategory');
	}

	public function companyProfile()
	{
		return $this->belongsTo('CompanyProfile');
	}

	public function userProfile()
	{
		return $this->belongsTo('UserProfile');
	}


}