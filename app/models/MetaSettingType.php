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
 * @property-read \MetaSettingCategory $metaSettingCategroy
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

	//relationships
	public function userSetting()
	{
		return $this->belongsTo('UserSetting');
	}
	public function metaSettingCategroy()
	{
		return $this->hasOne('MetaSettingCategory');
	}
}