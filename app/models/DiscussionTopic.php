<?php
	use LaravelBook\Ardent\Ardent;

/**
 * DiscussionTopic
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_category_id
 * @property string $title
 * @property string $description
 * @property integer $meta_discussion_permission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\DiscussionPost[] $discussionPost
 * @property-read \MetaDiscussionPermission $metaDiscussionPermission
 * @property-read \MetaDiscussionStatus $metaDiscussionStatus
 * @property-read \DiscussionCategory $discussionCategory
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereDiscussionCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereMetaDiscussionPermissionId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereMetaDiscussionStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionTopic whereDeletedAt($value)
 */
class DiscussionTopic extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'discussion_category_id'			=> 'required|integer',
		'title'								=> 'required|max:100',
		'meta_discussion_permission_id'		=> 'required|integer',
		'meta_discussion_status_id'			=> 'required|integer'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionCategory()
	{
		return $this->belongsTo('DiscussionCategory');
	}

	public function discussionPost()
	{
		return $this->hasMany('DiscussionPost');
	}

	public function metaDiscussionPermission()
	{
		return $this->belongsTo('MetaDiscussionPermission');
	}

	public function metaDiscussionStatus()
	{
		return $this->belongsTo('MetaDiscussionStatus');
	}

	/**
	 * Removes a topic and all of the records associated with it.
	 * 	- Posts
	 * 	- Comments
	 * 	- Follows
	 * 	- Views
	 *
	 * @param $id
	 * @throws Exception
	 */
	public function remove($id)
	{
		$follow = new DiscussionFollow();
		$view = new DiscussionView();

		$topic = $this
			->whereId($id)
			->with('discussionPost',
				   'discussionPost.discussionComment')
			->first();

		foreach ($topic->discussionPost as $post) {
			foreach ($post->discussionComment as $comment) {
				$follow->remove($comment->id, MetaDiscussionType::COMMENT);
				$comment->delete();
			}
			$follow->remove($post->id, MetaDiscussionType::POST);
			$view->whereDiscussionPostId($post->id)->delete();
			$post->delete();
		}
		$follow->remove($topic->id, MetaDiscussionType::TOPIC);
		$topic->delete();
	}

}