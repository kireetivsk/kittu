<?php

class MetaConnectionRelationships extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userConnection()
	{
		return $this->belongsTo('UserConnection');
	}


}