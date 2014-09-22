<?php

/**
 * CrmPeoplePhone
 *
 * @property integer $id
 * @property integer $crm_people_id
 * @property string $phone
 * @property integer $meta_phone_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property integer $crm_person_id
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaPhoneType $metaPhoneType
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone whereCrmPersonId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone wherePhone($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone whereMetaPhoneTypeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonPhone whereDeletedAt($value) 
 */
class CrmPersonPhone extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

	public function metaPhoneType()
	{
		return $this->hasOne('MetaPhoneType');
	}

}