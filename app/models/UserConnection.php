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
 * @property-read \MetaConnectionRelationship $metaConnectionRelationship
 * @property-read \MetaConnectionStatus $metaConnectionStatus
 * @property-read \UserCompanyMap $userCompanyMap
 * @property-read \User $user
 * @property-read \UserConnectionNote $userConnectionNote
 */
class UserConnection extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 							=> 'required|integer',
		'connection_id' 					=> 'required|integer',
		'user_company_map_id' 				=> 'required|integer',
		'meta_connection_status_id' 		=> 'required|integer',
		'meta_connection_relationship_id' 	=> 'required|integer'
	];

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
		return $this->belongsTo('UserConnectionNote');
	}

	//public methods
	public function makeReferralConnections()
	{
		$test = 1;
	}


}