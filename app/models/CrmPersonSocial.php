<?php

/**
 * CrmPeopleSocial
 *
 * @property-read \CrmPerson $crmPerson
 * @property-read \MetaSocialType $metaSocialType
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

		//relationships
	public function crmPerson()
	{
		return $this->belongsTo('CrmPerson');
	}

	public function metaSocialType()
	{
		return $this->hasOne('MetaSocialType');
	}

}