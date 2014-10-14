<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaMessageStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaMessageStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaMessageStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaMessageStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaMessageStatus whereOrdinal($value)
 * @property-read \Message $toMessage
 * @property-read \Message $fromMessage
 */
class MetaMessageStatus extends Ardent {
	protected $fillable = [];

	const STATUS_NEW              = 1;
	const STATUS_READ             = 2;
	const STATUS_SENT             = 3;
	const STATUS_DELETED          = 4;
	const STATUS_REVOKED          = 5;
	const STATUS_DRAFT            = 6;
	const STATUS_DELETED_FOR_REAL = 7;

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//validation
	public function toMessage()
	{
		return $this->hasOne('Message', 'id', 'to_message_status_id');
	}

	public function fromMessage()
	{
		return $this->hasOne('Message', 'id', 'from_message_status_id');
	}
}