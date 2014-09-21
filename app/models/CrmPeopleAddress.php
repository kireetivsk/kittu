<?php

/**
 * CrmPeopleAddress
 *
 * @property integer $id
 * @property integer $crm_people_id
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
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereCrmPeopleId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereAddress1($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereAddress2($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereAddress3($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereCity($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereState($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress wherePostalCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereCountry($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereLat($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereLng($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereMetaAddressTypeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleAddress whereDeletedAt($value) 
 */
class CrmPeopleAddress extends \Eloquent {
	protected $fillable = [];
}