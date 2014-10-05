<?php
	use LaravelBook\Ardent\Ardent;

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
 * @property string $slug
 * @method static \Illuminate\Database\Query\Builder|\MetaSettingType whereSlug($value)
 */
class MetaSettingType extends Ardent {
	protected $fillable = [];

    const LAST_COMPANY_SLUG = "last_company";

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
		return $this->hasOne('UserSetting');
	}

	public function metaSettingCategory()
	{
		return $this->belongsTo('MetaSettingCategory');
	}

    // public functions

    /**
     * Returns the id of the setting type for the last company selected setting
     *
     * @param NULL|array $settings
     * @return mixed
     */
    public function getLastCompanyId($settings = NULL)
    {
        if (is_null($settings))
        {
            $meta_setting = self::where('slug', '=', self::LAST_COMPANY_SLUG)->first(['id']);
            $id = $meta_setting->id;
        } else {
            foreach ($settings as $key => $value)
            {
                if ($value['slug'] == self::LAST_COMPANY_SLUG)
                {
                    $id = $key;
                    break;
                }
            }
        }
        return $id ? $id : FALSE;;
    }

}