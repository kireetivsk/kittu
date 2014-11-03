<?php
	use LaravelBook\Ardent\Ardent;

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
 * @property-read \User $user
 * @property-read \DiscussionTopic $discussionTopic
 * @property-read \MetaDiscussionStatus $metaDiscussionStatus
 * @property-read \MetaDiscussionPermission $metaDiscussionPermission
 */
class DiscussionCategory extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'title'								=> 'required|max:100',
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
		return $this->hasMany('DiscussionTopic');
	}

	public function metaDiscussionStatus()
	{
		return $this->belongsTo('MetaDiscussionStatus');
	}

	public function metaDiscussionPermission()
	{
		return $this->belongsTo('MetaDiscussionPermission');
	}

	/**
	 * Removes a category and all of the records associated with it.
	 * 	- Topics
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

		$cat = $this
			->whereId($id)
			->with('discussionTopic',
				   'discussionTopic.discussionPost',
				   'discussionTopic.discussionPost.discussionComment')
			->first();

		foreach ($cat->discussionTopic as $topic) {
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
		$follow->remove($cat->id, MetaDiscussionType::CATEGORY);
		$cat->delete();

	}

	public function getMyDiscussions()
	{
		return $this->where('user_id', '=', Auth::id())
					   ->where('meta_discussion_status_id', '=', MetaDiscussionStatus::PUBLISHED)
					   ->get();
	}

	public function getUplineDiscussions($user_id)
	{
		$user = new User();
		$upline = $user->getUpline($user_id);
		$categories = [];

		foreach ($upline as $value)
		{
			$result = $this->where('user_id', '=', $value)
				->where(
					function ($query) use($user_id)
					{
						$query
							->orWhere('meta_discussion_permission_id', '=', MetaDiscussionPermission::PERMISSION_DOWNLINE)
							->orWhere('meta_discussion_permission_id', '=', MetaDiscussionPermission::PERMISSION_PUBLIC);
					}
				)
				->where('meta_discussion_status_id', '=', MetaDiscussionStatus::PUBLISHED)
				->with('discussionTopic',
					   'discussionTopic.discussionPost',
					   'discussionTopic.discussionPost.discussionComment')
				->get();
			if (!$result->isEmpty()) {
				$categories = array_merge($categories,  $result->toArray());
			}
		}

		return $categories;

	}

	public function getDownlineDiscussions($user_id)
	{
		$user = new User();
		$downline = $user->getDownline($user_id);
		$categories = [];

		foreach ($downline as $value)
		{
			$result = $this->where('user_id', '=', $value)
							->where(
								function ($query) use($user_id)
								{
									$query
										->orWhere('meta_discussion_permission_id', '=', MetaDiscussionPermission::PERMISSION_UPLINE)
										->orWhere('meta_discussion_permission_id', '=', MetaDiscussionPermission::PERMISSION_PUBLIC);
								}
							)
						   ->where('meta_discussion_status_id', '=', MetaDiscussionStatus::PUBLISHED)
						   ->with('discussionTopic',
								  'discussionTopic.discussionPost',
								  'discussionTopic.discussionPost.discussionComment')
						   ->get();
			if (!$result->isEmpty())
				$categories = array_merge($categories,  $result->toArray());
		}

		return $categories;

	}
}
