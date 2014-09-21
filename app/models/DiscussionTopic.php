<?php

/**
 * DiscussionTopic
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_category_id
 * @property string $title
 * @property string $description
 * @property integer $meta_discussion_premission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereDiscussionCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereMetaDiscussionPremissionId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereMetaDiscussionStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\DiscussionPost[] $discussionPost
 * @property-read \MetaDiscussionPermission $metaDiscussionPermission
 * @property-read \MetaDiscussionStatus $metaDiscussionStatus
 * @property-read \DiscussionCategory $discussionCategory
 */
class DiscussionTopic extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionPost()
	{
		return $this->hasMany('DiscussionPost');
	}

	public function metaDiscussionPermission()
	{
		return $this->hasOne('MetaDiscussionPermission');
	}

	public function metaDiscussionStatus()
	{
		return $this->hasOne('MetaDiscussionStatus');
	}

	public function discussionCategory()
	{
		return $this->belongsTo('DiscussionCategory');
	}


}