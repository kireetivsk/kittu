<?php

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
class MetaNotificationType extends \Eloquent {
	protected $fillable = [];

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
		return $this->belongsTo('Notification');
	}
}