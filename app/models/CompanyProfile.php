<?php
	use LaravelBook\Ardent\Ardent;

/**
 * CompanyProfile
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $meta_profile_type_id
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereMetaProfileTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CompanyProfile whereDeletedAt($value)
 * @property-read \MetaProfileType $metaProfileType
 * @property-read \Company $company
 */
class CompanyProfile extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'company_id' 			=> 'required|integer',
		'meta_profile_type_id' 	=> 'required|integer',
		'value' 				=> 'required'
	];

	//relationships
	public function metaProfileType()
	{
		return $this->hasOne('MetaProfileType');
	}

	public function company()
	{
		return $this->hasOne('Company');
	}


}