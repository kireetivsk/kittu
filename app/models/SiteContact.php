<?php

/**
 * SiteContact
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string $acquired_from
 * @property string $notes
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact wherePhone($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereSubject($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereMessage($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereAcquiredFrom($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereNotes($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\SiteContact whereDeletedAt($value) 
 */
class SiteContact extends \Eloquent {
	protected $fillable = [];
}