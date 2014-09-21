<?php

/**
 * UserConnectionNote
 *
 * @property integer $id
 * @property integer $user_connection_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\UserConnectionNote whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnectionNote whereUserConnectionId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnectionNote whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnectionNote whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnectionNote whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnectionNote whereDeletedAt($value) 
 */
class UserConnectionNote extends \Eloquent {
	protected $fillable = [];
}