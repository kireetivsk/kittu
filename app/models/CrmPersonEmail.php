<?php

/**
 * CrmPeopleEmail
 *
 * @property integer $id
 * @property integer $crm_person_id
 * @property string $email
 * @property integer $meta_email_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaEmailType $metaEmailType
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereCrmPersonId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereMetaEmailTypeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonEmail whereDeletedAt($value) 
 */
class CrmPersonEmail extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'crm_person_id' 					=> 'required|integer',
		'email'								=> 'required|email|max:100',
		'meta_email_type_id'				=> 'required|integer'
	];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

	public function metaEmailType()
	{
		return $this->hasOne('MetaEmailType');
	}
}