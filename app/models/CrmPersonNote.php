<?php

/**
 * CrmPeopleNote
 *
 * @property integer $id
 * @property integer $crm_person_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonNote whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonNote whereCrmPersonId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonNote whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonNote whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonNote whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonNote whereDeletedAt($value) 
 */
class CrmPersonNote extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

}