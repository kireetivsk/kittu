<?php

/**
 * MetaSettingType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $default_value
 * @property integer $meta_setting_category_id
 * @property string $setting_type
 * @property integer $ordinal
 * @property-read \UserSetting $userSetting
 * @property-read \MetaSettingCategory $metaSettingCategory
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereDefaultValue($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereMetaSettingCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereSettingType($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereOrdinal($value)
 */
class MetaSettingType extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 						=> 'required|max:45',
		'description' 				=> 'max:100',
		'default_value'				=> 'required|max:100',
		'meta_setting_category_id'	=> 'required|integer',
		'setting_type'				=> 'required|un:user,company'
	];

	//relationships
	public function userSetting()
	{
		return $this->belongsTo('UserSetting');
	}
	public function metaSettingCategory()
	{
		return $this->hasOne('MetaSettingCategory');
	}
}