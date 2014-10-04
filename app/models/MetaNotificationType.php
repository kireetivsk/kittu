<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaNotificationType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property string $color
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaNotificationType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaNotificationType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaNotificationType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaNotificationType whereIcon($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaNotificationType whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaNotificationType whereOrdinal($value)
 * @property-read \Notification $notification
 */
class MetaNotificationType extends Ardent {
	protected $fillable = [];

	const NOTIFICATION_TYPE_CONNECTION = 1;
	const NOTIFICATION_TYPE_MESSAGE    = 2;
	const NOTIFICATION_TYPE_SYSTEM     = 3;
	const NOTIFICATION_TYPE_BILLING    = 4;
	const NOTIFICATION_TYPE_DISCUSSION = 5;
	const NOTIFICATION_TYPE_QA         = 6;
	const NOTIFICATION_TYPE_CRM        = 7;
	const NOTIFICATION_TYPE_TRAINING   = 8;

	protected $hidden = [
		'name',
		'description',
		'id',
		'ordinal'
	];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100',
		'icon' 				=> 'required|max:45',
		'color' 			=> 'required|max:45',
	];

	//relationships
	public function notification()
	{
		return $this->hasOne('Notification');
	}
}