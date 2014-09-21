<?php

/**
 * UserSetting
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $meta_setting_type_id
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereMetaSettingTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\UserSetting whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \MetaSettingType $metaSettingType
 */
class UserSetting extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->hasOne('User');
	}

	public function metaSettingType()
	{
		return $this->hasOne('MetaSettingType');
	}
}