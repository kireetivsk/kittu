<?php

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
class MetaDiscussionStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function discussionCategory()
	{
		return $this->belongsTo('DiscussionCategory');
	}

	public function discussionTopic()
	{
		return $this->belongsTo('DiscussionTopic');
	}

	public function discussionPost()
	{
		return $this->belongsTo('DiscussionPost');
	}

	public function discussionComment()
	{
		return $this->belongsTo('DiscussionComment');
	}


}