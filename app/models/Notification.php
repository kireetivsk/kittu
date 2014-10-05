<?php
	use LaravelBook\Ardent\Ardent;

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
 * @property-read \MetaNotificationType $metaNotificationType
 */
class Notification extends Ardent {
	protected $fillable = [];

	protected $hidden = [
		'created_at',
		'deleted_at',
		'dismissed',
		'meta_notification_type_id',
		'origin',
		'updated_at',
		'user_id'
	];


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
		return $this->belongsTo('MetaNotificationType');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Return all notifications for a user
	 *
	 * @param $user_id
	 *
	 * @return mixed
	 */
	public function get($user_id)
	{
		return $this
			->where('user_id', '=', $user_id)
			->whereNull('seen')
			->whereNull('dismissed')
			->where('user_id', '=', $user_id)
			->with('metaNotificationType')
			->orderBy('sent', 'desc')
			->get();

	}

	/**
	 * Mark a notification as seen
	 *
	 * @param $id
	 */
	public function clearNotification($id)
	{
		$notification 				= $this->find($id);
		$notification->seen 		= Dsk::now();
		$notification->dismissed 	= Dsk::now();
		$notification->save();
	}
}