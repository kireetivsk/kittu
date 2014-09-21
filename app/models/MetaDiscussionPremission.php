<?php

/**
 * MetaDiscussionPremission
 *
 * @property-read \DiscussionPost $discussionPost
 * @property-read \DiscussionComment $discussionComment
 * @property-read \DiscussionTopic $discussionTopic
 * @property-read \DiscussionCategory $discussionCategory
 */
class MetaDiscussionPremission extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function discussionPost()
	{
		return $this->belongsTo('DiscussionPost');
	}

	public function discussionComment()
	{
		return $this->belongsTo('DiscussionComment');
	}

	public function discussionTopic()
	{
		return $this->belongsTo('DiscussionTopic');
	}

	public function discussionCategory()
	{
		return $this->belongsTo('DiscussionCategory');
	}


}