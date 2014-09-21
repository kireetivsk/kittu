<?php

class MetaDiscussionType extends \Eloquent {
	protected $fillable = [];

	public function discussionFollow()
	{
		return $this->belongsTo('DiscussionFollow');
	}


}