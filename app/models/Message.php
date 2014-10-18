<?php
	use LaravelBook\Ardent\Ardent;

/**
 * Message
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $to_user
 * @property integer $to_meta_message_status_id
 * @property integer $from_user
 * @property integer $from_meta_message_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereToUser($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereToMetaMessageStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereFromUser($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereFromMetaMessageStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Message whereDeletedAt($value)
 * @property-read \User $toUser
 * @property-read \User $fromUser
 * @property-read \MetaMessageStatus $toMetaMessageStatus
 * @property-read \MetaMessageStatus $fromMetaMessageStatus
 * @property integer $message_folder_id
 * @property-read \MessageFolder $messageFolder
 * @method static \Illuminate\Database\Query\Builder|\Message whereMessageFolderId($value) 
 */
class Message extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'title' 						=> 'required|max:45',
		'content'						=> 'required|max:160',
		'to_user' 						=> 'required|integer',
		'to_meta_message_status_id' 	=> 'required|integer',
		'from_user' 					=> 'required|integer',
		'from_meta_message_status_id' 	=> 'required|integer'
	];

	//relationships
	public function toUser()
	{
		return $this->belongsTo('User', 'to_user', 'id');
	}
	public function fromUser()
	{
		return $this->belongsTo('User', 'from_user', 'id');
	}

	public function toMetaMessageStatus()
	{
		return $this->belongsTo('MetaMessageStatus', 'to_meta_message_status_id', 'id');
	}

	public function fromMetaMessageStatus()
	{
		return $this->belongsTo('MetaMessageStatus', 'from_meta_message_status_id', 'id');
	}

	public function messageFolder()
	{
		return $this->belongsTo('MessageFolder');
	}

	//public functions
	/**
	 * Saves a message
	 *
	 * @param $recipient_user_id
	 * @param $subject
	 * @param $content
	 *
	 * @return bool|\Illuminate\Support\MessageBag
	 */
	public function saveMessage($recipient_user_id, $subject, $content)
	{
		$this->title = $subject;
		$this->content = $content;
		$this->to_user = $recipient_user_id;
		$this->to_meta_message_status_id = MetaMessageStatus::STATUS_NEW;
		$this->from_user = Auth::id();
		$this->from_meta_message_status_id = MetaMessageStatus::STATUS_SENT;

		if ($this->validate())
		{
			$this->save();
			//add notification
			$notification = new Notification();
			$notification->user_id = $recipient_user_id;
			$notification->origin = "app/models/Message.php:" . __LINE__;
			$notification->title = trans('general.new_message_notification');
			$notification->body = trans('general.new_message_body', ['name' => User::find(Auth::id())->full_name]);
			$notification->meta_notification_type_id = MetaNotificationType::NOTIFICATION_TYPE_MESSAGE;
			$notification->save();

			return TRUE;
		} else {
			return $this->errors();
		}
	}
}