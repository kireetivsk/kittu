<?php

/**
 * CrmPeopleContact
 *
 * @property integer $id
 * @property integer $crm_person_id
 * @property string $contact_type
 * @property string $contact_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereCrmPersonId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereContactType($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereContactDate($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonContact whereDeletedAt($value) 
 */
class CrmPersonContact extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

}