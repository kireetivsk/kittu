<?php

/**
 * DiscussionPost
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $discussion_topic_id
 * @property string $title
 * @property string $content
 * @property integer $meta_discussion_premission_id
 * @property integer $meta_discussion_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereDiscussionTopicId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereMetaDiscussionPremissionId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereMetaDiscussionStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\DiscussionPost whereDeletedAt($value) 
 */
class DiscussionPost extends \Eloquent {
	protected $fillable = [];
}