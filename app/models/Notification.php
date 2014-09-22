<?php

/**
 * Notification
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $origin
 * @property string $title
 * @property string $body
 * @property integer $meta_notification_type_id
 * @property string $sent
 * @property string $seen
 * @property string $dismissed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Notification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereOrigin($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereMetaNotificationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereSent($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereSeen($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereDismissed($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Notification whereDeletedAt($value)
 */
class Notification extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 					=> 'required|integer',
		'origin' 					=> 'max:255',
		'title' 					=> 'required|max:45',
		'body' 						=> 'required',
		'meta_notification_type_id'	=> 'required|integer',
		'sent' 						=> 'required|date_format:Y-m-d H:i:s',
		'seen' 						=> 'date_format:Y-m-d H:i:s',
		'dismissed' 				=> 'date_format:Y-m-d H:i:s'
	];

	//relationships
	public function metaNotificationType()
	{
		return $this->hasOne('MetaNotificationType');
	}
}