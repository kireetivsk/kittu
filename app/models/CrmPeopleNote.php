<?php

/**
 * CrmPeopleNote
 *
 * @property integer $id
 * @property integer $crm_people_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleNote whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleNote whereCrmPeopleId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleNote whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleNote whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleNote whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleNote whereDeletedAt($value) 
 */
class CrmPeopleNote extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

}