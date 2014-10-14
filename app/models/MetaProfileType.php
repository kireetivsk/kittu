<?php
	use LaravelBook\Ardent\Ardent;

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
class MetaProfileType extends Ardent {
	protected $fillable = [];

	const PROFILE_TYPE_CONSULTANT  = 'consultant';
	const PROFILE_TYPE_COMPANY     = 'company';
	const PROFILE_TYPE_MARKETPLACE = 'marketplace';
	const PROFILE_TYPE_ADVERTISER  = 'advertiser';

	//validation
	public static $rules = [
		'name' 							=> 'required|max:45',
		'description' 					=> 'max:100',
		'default_value'					=> 'required|max:100',
		'meta_profile_category_id'		=> 'integer',
		'profile_type'					=> 'required|in:user,company,marketplace,advertiser'
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
		return $this->belongsto('UserProfile');
	}


}