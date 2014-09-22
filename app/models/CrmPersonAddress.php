<?php

/**
 * CrmPeopleAddress
 *
 * @property integer $id
 * @property integer $crm_person_id
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $country
 * @property float $lat
 * @property float $lng
 * @property integer $meta_address_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaAddressType $metaAddressType
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereCrmPersonId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereAddress1($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereAddress2($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereAddress3($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereCity($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereState($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress wherePostalCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereCountry($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereLat($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereLng($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereMetaAddressTypeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonAddress whereDeletedAt($value) 
 */
class CrmPersonAddress extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'email' 							=> 'required|email',
		'meta_connection_relationship_id'	=> 'required|integer'
	];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

	public function metaAddressType()
	{
		return $this->hasOne('MetaAddressType');
	}

}