<?php

/**
 * DiscussionComment
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_post_id
 * @property string $title
 * @property string $content
 * @property integer $meta_discussion_premission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereDiscussionPostId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereMetaDiscussionPremissionId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereMetaDiscussionStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereDeletedAt($value) 
 */
class DiscussionComment extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionPost()
	{
		return $this->belongsTo('DiscussionPost');
	}

	public function metaDiscussionPermission()
	{
		return $this->hasOne('DiscussionPermission');
	}

	public function metaDiscussionStatus()
	{
		return $this->hasOne('DiscussionStatus');
	}
}