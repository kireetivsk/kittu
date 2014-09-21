<?php

/**
 * MessageFolder
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\MessageFolder whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MessageFolder whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\MessageFolder whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MessageFolder whereDescription($value)
 * @property-read \User $user
 */
class MessageFolder extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}
}