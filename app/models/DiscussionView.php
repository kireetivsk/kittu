<?php
	use LaravelBook\Ardent\Ardent;

/**
 * DiscussionView
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_post_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereDiscussionPostId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionView whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \DiscussionPost $discussionPost
 */
class DiscussionView extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'discussion_post_id'				=> 'required|integer'
	];

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