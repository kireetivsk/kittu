<?php

/**
 * CrmPeopleWebsite
 *
 * @property integer $id
 * @property integer $crm_people_id
 * @property string $website
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereCrmPeopleId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereWebsite($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleWebsite whereDeletedAt($value) 
 */
class CrmPeopleWebsite extends \Eloquent {
	protected $fillable = [];
}