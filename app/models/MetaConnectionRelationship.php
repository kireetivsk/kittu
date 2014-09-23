<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaConnectionRelationship
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \UserConnection $userConnection
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationship whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationship whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationship whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaConnectionRelationship whereOrdinal($value)
 */
class MetaConnectionRelationship extends Ardent {
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