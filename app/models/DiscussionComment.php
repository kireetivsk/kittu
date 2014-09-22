<?php

/**
 * DiscussionComment
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_post_id
 * @property string $title
 * @property string $content
 * @property integer $meta_discussion_permission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \User $user
 * @property-read \DiscussionPost $discussionPost
 * @property-read \MetaDiscussionPermission $metaDiscussionPermission
 * @property-read \MetaDiscussionStatus $metaDiscussionStatus
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereDiscussionPostId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereMetaDiscussionPermissionId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereMetaDiscussionStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionComment whereDeletedAt($value)
 */
class DiscussionComment extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'discussion_post_id'				=> 'required|integer',
		'title'								=> 'required|alpha_num|max:100',
		'content'							=> 'required',
		'meta_discussion_permission_id'		=> 'required|integer',
		'meta_discussion_status_id'			=> 'required|integer'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionPost()
	{
		return $this->belongsTo('MetaDiscussionPost');
	}

	public function metaDiscussionPermission()
	{
		return $this->hasOne('MetaDiscussionPermission');
	}

	public function metaDiscussionStatus()
	{
		return $this->hasOne('DiscussionStatus');
	}
}