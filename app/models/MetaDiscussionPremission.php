<?php

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