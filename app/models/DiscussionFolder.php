<?php

/**
 * DiscussionFolder
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFolder whereDeletedAt($value) 
 */
class DiscussionFolder extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionFollow()
	{
		return $this->belongsTo('DiscussionFollow');
	}


}