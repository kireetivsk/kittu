<?php

/**
 * DiscussionView
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discuession_post_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereDiscuessionPostId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereDeletedAt($value) 
 */
class DiscussionView extends \Eloquent {
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

}