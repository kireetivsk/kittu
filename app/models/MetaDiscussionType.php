<?php

/**
 * MetaDiscussionType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \DiscussionFollow $discussionFollow
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaDiscussionType whereOrdinal($value)
 */
class MetaDiscussionType extends \Eloquent {
	protected $fillable = [];

	public function discussionFollow()
	{
		return $this->belongsTo('DiscussionFollow');
	}


}