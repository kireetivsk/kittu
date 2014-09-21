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
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereBirthdate($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereMetaCrmPeopleTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereNetaCrmPeopleStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPerson whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleContact[] $crmPeopleContact
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleNotes[] $crmPeopleNotes
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleWebsite[] $crmPeopleWebsite
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleEmail[] $crmPeopleEmail
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleAddress[] $crmPeopleAddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleAPhone[] $crmPeoplePhone
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrmPeopleSocial[] $crmPeopleSocial
 * @property-read \MetaCrmPeopleType $metaCrmPeopleType
 * @property-read \MetaCrmPeopleStatus $metaCrmPeopleStatus
 */
class CrmPerson extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function crmPeopleContact()
	{
		return $this->hasMany('CrmPeopleContact');
	}

	public function crmPeopleNotes()
	{
		return $this->hasMany('CrmPeopleNotes');
	}

	public function crmPeopleWebsite()
	{
		return $this->hasMany('CrmPeopleWebsite');
	}

	public function crmPeopleEmail()
	{
		return $this->hasMany('CrmPeopleEmail');
	}

	public function crmPeopleAddress()
	{
		return $this->hasMany('CrmPeopleAddress');
	}

	public function crmPeoplePhone()
	{
		return $this->hasMany('CrmPeopleAPhone');
	}

	public function crmPeopleSocial()
	{
		return $this->hasMany('CrmPeopleSocial');
	}

	public function metaCrmPeopleType()
	{
		return $this->hasOne('MetaCrmPeopleType');
	}

	public function metaCrmPeopleStatus()
	{
		return $this->hasOne('MetaCrmPeopleStatus');
	}
}