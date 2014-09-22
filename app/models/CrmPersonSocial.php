<?php

/**
 * CrmPeopleSocial
 *
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaSocialNetwork $metaSocialNetwork
 * @property integer $id
 * @property integer $crm_person_id
 * @property string $social
 * @property integer $meta_social_network_id
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereCrmPersonId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereSocial($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereMetaSocialNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CrmPersonSocial whereDeletedAt($value)
 */
class CrmPersonSocial extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'crm_person_id' 					=> 'required|integer',
		'website'							=> 'required|max:254|url',
		'description'						=> 'max:100'
	];

	//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

	public function metaSocialNetwork()
	{
		return $this->hasOne('MetaSocialNetwork');
	}

}