<?php

/**
 * DiscussionPost
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_topic_id
 * @property string $title
 * @property string $content
 * @property integer $meta_discussion_permission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\DiscussionView[] $discussionView
 * @property-read \Illuminate\Database\Eloquent\Collection|\DiscussionComment[] $discussionComment
 * @property-read \MetaDiscussionStatus $metaDiscussionStatus
 * @property-read \DiscussionTopic $discussionTopic
 * @property-read \MetaDiscussionPermission $metaDiscussionPermission
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereDiscussionTopicId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereMetaDiscussionPermissionId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereMetaDiscussionStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereDeletedAt($value) 
 */
class DiscussionPost extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionView()
	{
		return $this->hasMany('DiscussionView');
	}

	public function discussionComment()
	{
		return $this->hasMany('DiscussionComment');
	}

	public function metaDiscussionStatus()
	{
		return $this->hasOne('MetaDiscussionStatus');
	}

	public function discussionTopic()
	{
		return $this->belongsTo('DiscussionTopic');
	}

	public function metaDiscussionPermission()
	{
		return $this->hasOne('MetaDiscussionPermission');
	}
}