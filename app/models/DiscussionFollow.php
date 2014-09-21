<?php

/**
 * DiscussionFollow
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_id
 * @property integer $meta_discussion_type_id
 * @property integer $discussion_folder_id
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereDiscussionId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereMetaDiscussionTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereDiscussionFolderId($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DiscussionFollow whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \DiscussionFolder $discussionFolder
 * @property-read \MetaDiscussionType $metaDiscussionType
 */
class DiscussionFollow extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussionFolder()
	{
		return $this->hasOne('DiscussionFolder');
	}

	public function metaDiscussionType()
	{
		return $this->hasOne('MetaDiscussionType');
	}
}