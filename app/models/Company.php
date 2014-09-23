<?php
	use LaravelBook\Ardent\Ardent;

/**
 * Company
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $website
 * @property integer $company_category_id
 * @property integer $meta_company_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Company whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereCompanyCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereMetaCompanyStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Company whereDeletedAt($value)
 * @property-read \CompanyCategory $companyCategory
 * @property-read \metaCompanyStatus $metaCompanyStatus
 * @property-read \CompanyPaymentProfile $companyPaymentProfile
 * @property-read \CompanyProfile $companyProfile
 * @property-read \CompanyBillingTransaction $companyBillingTransaction
 * @property-read \UserCompanyMap $userCompanyMap
 * @property-read \Illuminate\Database\Eloquent\Collection|\User[] $user
 */
class Company extends Ardent {
	protected $fillable = [
		'name'
	];

	//validation
	public static $rules = [
		'name'                  => 'required|max:100|unique:companies',
		'slug'           		=> 'required|max:100|unique:companies',
		'website'              	=> 'max:254|url',
		'company_category_id' 	=> 'integer',
		'meta_company_status_id'=> 'integer'
	];

	//relationships
	public function companyCategory()
	{
		return $this->hasOne('CompanyCategory');
	}

	public function metaCompanyStatus()
	{
		return $this->hasOne('metaCompanyStatus');
	}

	public function companyPaymentProfile()
	{
		return $this->belongsTo('CompanyPaymentProfile');
	}

	public function companyProfile()
	{
		return $this->belongsTo('CompanyProfile');
	}

	public function companyBillingTransaction()
	{
		return $this->belongsTo('CompanyBillingTransaction');
	}

	public function userCompanyMap()
	{
		return $this->belongsTo('UserCompanyMap');
	}

	public function user()
	{
		return $this->belongsToMany('User');
	}

	/**
	 * Return a company name that matches term%
	 *
	 * @param $term
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function partialNameSearch($term)
	{
		return $this->where('name', 'LIKE', "$term%")->get()->toArray();
	}

	public function addByName($name)
	{
		$this->name = $name;
		$this->slug = Dsk::slugify($name);
		$this->company_category_id = CompanyCategory::USER_SUBMITTED;
		if ($this->validate())
		{
			$this->save();
			return $this->id;
		}
	}
}