<?php

/**
 * ConnectionRequest
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 * @property integer $meta_connection_relationship_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereMetaConnectionRelationshipId($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\ConnectionRequest whereDeletedAt($value)
 */
class ConnectionRequest extends \Eloquent {
	protected $fillable = [];
}