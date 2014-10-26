<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaDiscussionStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \DiscussionCategory $discussionCategory
 * @property-read \DiscussionTopic $discussionTopic
 * @property-read \DiscussionPost $discussionPost
 * @property-read \DiscussionComment $discussionComment
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionStatus whereOrdinal($value)
 */
class MetaDiscussionStatus extends Ardent {
	protected $fillable = [];

	const PENDING = 1;
	const PUBLISHED = 2;
	const DELETED = 3;

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function discussionCategory()
	{
		return $this->hasOne('DiscussionCategory');
	}

	public function discussionTopic()
	{
		return $this->hasOne('DiscussionTopic');
	}

	public function discussionPost()
	{
		return $this->hasOne('DiscussionPost');
	}

	public function discussionComment()
	{
		return $this->hasOne('DiscussionComment');
	}


}