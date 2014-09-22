<?php

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
class MetaDiscussionPermission extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

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