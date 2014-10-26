<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaDiscussionType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \DiscussionFollow $discussionFollow
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereOrdinal($value)
 */
class MetaDiscussionType extends Ardent {
	protected $fillable = [];

	const CATEGORY = 1;
	const TOPIC    = 2;
	const POST     = 3;
	const COMMENT  = 4;

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	public function discussionFollow()
	{
		return $this->hasOne('DiscussionFollow');
	}


}