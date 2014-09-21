<?php

/**
 * UserConnection
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $connection_id
 * @property integer $user_company_map_id
 * @property integer $meta_connection_status_id
 * @property integer $meta_connection_relationship_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereConnectionId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereUserCompanyMapId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereMetaConnectionStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereMetaConnectionRelationshipId($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\UserConnection whereDeletedAt($value) 
 */
class UserConnection extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function metaConnectionRelationship()
	{
		return $this->hasOne('MetaConnectionRelationship');
	}

	public function metaConnectionStatus()
	{
		return $this->hasOne('MetaConnectionStatus');
	}

	public function userCompanyMap()
	{
		return $this->hasOne('UserCompanyMap');
	}

	public function user()
	{
		return $this->hasOne('User');
	}

	public function userConnectionNote()
	{
		return $this->belongsTo('userConnectionNote');
	}

	//public methods
	public function makeReferralConnections()
	{
		$test = 1;
	}


}