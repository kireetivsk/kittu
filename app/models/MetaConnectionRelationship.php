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

	const CONNECTION_RELATIONSHIP_SPONSOR  = 1;
	const CONNECTION_RELATIONSHIP_UPLINE   = 2;
	const CONNECTION_RELATIONSHIP_DOWNLINE = 3;

	public static $relationships = [
		'upline'   => self::CONNECTION_RELATIONSHIP_UPLINE,
		'downline' => self::CONNECTION_RELATIONSHIP_DOWNLINE,
		'sponsor'  => self::CONNECTION_RELATIONSHIP_SPONSOR
	];

	public static $relationship_names = [
		self::CONNECTION_RELATIONSHIP_UPLINE   => 'upline',
		self::CONNECTION_RELATIONSHIP_DOWNLINE => 'downline',
		self::CONNECTION_RELATIONSHIP_SPONSOR  => 'sponsor'
	];

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

	//public functions
	public static function getRelationshipName($relationship_id)
	{
		return self::$relationship_names[$relationship_id];
	}

	public static function getRelationshipOppositeById($relationship_id)
	{
		if ($relationship_id == self::CONNECTION_RELATIONSHIP_DOWNLINE)
			return self::CONNECTION_RELATIONSHIP_UPLINE;
		else
			return self::CONNECTION_RELATIONSHIP_DOWNLINE;
	}

	public static function getRelationshipOppositeByName($relationship_name)
	{
		if ($relationship_name == 'downline')
			return 'upline';
		else
			return 'downline';
	}

}