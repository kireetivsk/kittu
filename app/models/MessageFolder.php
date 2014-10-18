<?php
	use LaravelBook\Ardent\Ardent;

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
 * @property string $slug
 * @property string $color
 * @property-read \Message $message
 * @method static \Illuminate\Database\Query\Builder|\MessageFolder whereSlug($value) 
 * @method static \Illuminate\Database\Query\Builder|\MessageFolder whereColor($value) 
 */
class MessageFolder extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 	=> 'required|integer',
		'name' 		=> 'required|max:45'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function message()
	{
		return $this->hasOne('Message');
	}
}