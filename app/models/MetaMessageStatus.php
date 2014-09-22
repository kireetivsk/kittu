<?php

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
 */
class MetaMessageStatus extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//validation
	public function toMessage()
	{
		return $this->belongsTo('Message', 'to_message_status_id');
	}

	public function fromMessage()
	{
		return $this->belongsTo('Message', 'from_message_status_id');
	}
}