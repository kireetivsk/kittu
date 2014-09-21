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
 */
class CrmPerson extends \Eloquent {
	protected $fillable = [];
}