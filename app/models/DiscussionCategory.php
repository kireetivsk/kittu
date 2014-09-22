<?php

/**
 * DiscussionCategory
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property integer $meta_discussion_permission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereMetaDiscussionPermissionId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereMetaDiscussionStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionCategory whereDeletedAt($value) 
 */
class DiscussionCategory extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'title'								=> 'required|alpha_num|max:100',
		'description'						=> 'max:100',
		'meta_discussion_permission_id'		=> 'required|integer',
		'meta_discussion_status_id'			=> 'required|integer'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionTopic()
	{
		return $this->belongsTo('DiscussionTopic');
	}

	public function metaDiscussionStatus()
	{
		return $this->hasOne('MetaDiscussionStatus');
	}

	public function discussionPermission()
	{
		return $this->hasOne('DiscussionPermission');
	}
}