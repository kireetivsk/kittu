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
		return $this->belongsTo('User', 'id', 'to_user');
	}
	public function fromUser()
	{
		return $this->belongsTo('User', 'id', 'from_user');
	}

	public function toMetaMessageStatus()
	{
		return $this->belongsTo('MetaMessageStatus', 'id', 'to_meta_message_status_id');
	}
	public function fromMetaMessageStatus()
	{
		return $this->belongsTo('MetaMessageStatus', 'id', 'from_meta_message_status_id');
	}
}