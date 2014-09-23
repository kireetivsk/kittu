<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaConnectionStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \UserConnection $userConnection
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionStatus whereOrdinal($value)
 */
class MetaConnectionStatus extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function userConnection()
	{
		return $this->belongsTo('UserConnection');
	}


}