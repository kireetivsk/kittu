<?php

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
 */
class Company extends \Eloquent {
	protected $fillable = [];

	/**
	 * Return a company name that matches term%
	 *
	 * @param $term
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function partialNameSearch($term)
	{
		return $this->where('name', 'LIKE', "$term%")->get();
	}
}