<?php

/**
 * Message
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $to_user
 * @property integer $to_meta_message_status_id
 * @property integer $from_user
 * @property integer $from_meta_message_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Message whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereToUser($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereToMetaMessageStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereFromUser($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereFromMetaMessageStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Message whereDeletedAt($value) 
 */
class Message extends \Eloquent {
	protected $fillable = [];
}