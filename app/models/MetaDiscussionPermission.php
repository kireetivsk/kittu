<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaDiscussionPermission
 *
 * @property-read \DiscussionPost $discussionPost
 * @property-read \DiscussionComment $discussionComment
 * @property-read \DiscussionTopic $discussionTopic
 * @property-read \DiscussionCategory $discussionCategory
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionPermission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionPermission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionPermission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionPermission whereOrdinal($value)
 */
class MetaDiscussionPermission extends Ardent {
	protected $fillable = [];

	const PERMISSION_PUBLIC = 1;
	const PERMISSION_DOWNLINE = 2;
	const PERMISSION_UPLINE = 3;
	const PERMISSION_PRIVATE = 4;

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function discussionPost()
	{
		return $this->hasOne('DiscussionPost');
	}

	public function discussionComment()
	{
		return $this->hasOne('DiscussionComment');
	}

	public function discussionTopic()
	{
		return $this->hasOne('DiscussionTopic');
	}

	public function discussionCategory()
	{
		return $this->hasOne('DiscussionCategory');
	}


}