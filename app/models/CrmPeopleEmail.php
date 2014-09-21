<?php

/**
 * CrmPeopleEmail
 *
 * @property integer $id
 * @property integer $crm_people_id
 * @property string $email
 * @property integer $meta_email_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereCrmPeopleId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereMetaEmailTypeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CrmPeopleEmail whereDeletedAt($value) 
 */
class CrmPeopleEmail extends \Eloquent {
	protected $fillable = [];
}