<?php

class MetaConnectionStatus extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userConnection()
	{
		return $this->belongsTo('UserConnection');
	}


}