<?php
	use LaravelBook\Ardent\Ardent;

/**
 * CrmPerson
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $birthdate
 * @property integer $meta_crm_person_type_id
 * @property integer $meta_crm_person_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonContact[] $crmPersonContact
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonNote[] $crmPersonNote
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonWebsite[] $crmPersonWebsite
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonEmail[] $crmPersonEmail
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonAddress[] $crmPersonAddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonPhone[] $crmPersonPhone
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonSocial[] $crmPersonSocial
 * @property-read \MetaCrmPersonType $metaCrmPersonType
 * @property-read \MetaCrmPersonStatus $metaCrmPersonStatus
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereBirthdate($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereMetaCrmPersonTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereMetaCrmPersonStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereDeletedAt($value)
 */
class CrmPerson extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'first_name' 						=> 'alpha|max:45',
		'last_name' 						=> 'alpha|max:45',
		'company' 							=> 'alpha|max:45',
		'birthdate'							=> 'date',
		'meta_crm_person_type_id'			=> 'integer',
		'meta_crm_person_status_id'			=> 'integer'
	];


	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function crmPersonContact()
	{
		return $this->hasMany('CrmPersonContact');
	}

	public function crmPersonNote()
	{
		return $this->hasMany('CrmPersonNote');
	}

	public function crmPersonWebsite()
	{
		return $this->hasMany('CrmPersonWebsite');
	}

	public function crmPersonEmail()
	{
		return $this->hasMany('CrmPersonEmail');
	}

	public function crmPersonAddress()
	{
		return $this->hasMany('CrmPersonAddress');
	}

	public function crmPersonPhone()
	{
		return $this->hasMany('CrmPersonPhone');
	}

	public function crmPersonSocial()
	{
		return $this->hasMany('CrmPersonSocial');
	}

	public function metaCrmPersonType()
	{
		return $this->hasOne('MetaCrmPersonType');
	}

	public function metaCrmPersonStatus()
	{
		return $this->hasOne('MetaCrmPersonStatus');
	}
}