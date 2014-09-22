<?php

/**
 * CrmPeopleContact
 *
 * @property integer $id
 * @property integer $crm_people_id
 * @property string $contact_type
 * @property string $contact_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereCrmPeopleId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereContactType($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereContactDate($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleContact whereDeletedAt($value)
 * @property-read \CrmPerson $crmPerson
 */
class CrmPersonContact extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

}