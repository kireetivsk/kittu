<?php

/**
 * Lead
 *
 * @property integer $id
 * @property string $email
 * @property string $phone
 * @property string $first_name
 * @property string $last_name
 * @property integer $assigned_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Lead whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereAssignedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Lead whereDeletedAt($value)
 * @property-read \User $user
 */
class Lead extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'email' 							=> 'email|max:255',
		'phone'								=> 'max:20',
		'first_name' 						=> 'alpha|max:45',
		'last_name' 						=> 'alpha|max:45',
		'assigned_user_id'					=> 'integer'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

}