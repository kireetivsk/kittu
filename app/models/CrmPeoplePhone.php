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
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone whereCrmPeopleId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone whereMetaPhoneTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeoplePhone whereDeletedAt($value)
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaPhoneType $metaPhoneType
 */
class CrmPeoplePhone extends \Eloquent {
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