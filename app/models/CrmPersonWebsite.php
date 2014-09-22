<?php

/**
 * CrmPeopleWebsite
 *
 * @property integer $id
 * @property integer $crm_person_id
 * @property string $website
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \CrmPerson $crmPerson
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereCrmPersonId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereWebsite($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonWebsite whereDeletedAt($value) 
 */
class CrmPersonWebsite extends \Eloquent {
	protected $fillable = [];

	public static $rules = [
		'crm_person_id' 					=> 'required|integer',
		'website'							=> 'required|max:254|url',
		'meta_social_network_id'			=> 'required|integer',
		'description'						=> 'max:100'
	];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

}