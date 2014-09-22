<?php

/**
 * CrmPerson
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $birthdate
 * @property integer $meta_crm_people_type_id
 * @property integer $neta_crm_people_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property integer $meta_crm_person_type_id
 * @property integer $meta_crm_person_status_id
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonContact[] $crmPersonContact
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonNotes[] $crmPersonNotes
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonWebsite[] $crmPersonWebsite
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonEmail[] $crmPersonEmail
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonAddress[] $crmPersonAddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPersonAPhone[] $crmPersonPhone
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
class CrmPerson extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function crmPersonContact()
	{
		return $this->hasMany('CrmPersonContact');
	}

	public function crmPersonNotes()
	{
		return $this->hasMany('CrmPersonNotes');
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
		return $this->hasMany('CrmPersonAPhone');
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