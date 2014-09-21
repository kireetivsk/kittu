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
 * @property-read \CompanyProfileType $companyProfileType
 * @property-read \UserProfileType $userProfileType
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

	//relationships
	public function metaProfileCategory()
	{
		return $this->hasOne('MetaProfileCategory');
	}

	public function companyProfileType()
	{
		return $this->belongsTo('CompanyProfileType');
	}

	public function userProfileType()
	{
		return $this->belongsTo('UserProfileType');
	}


}