<?php

class UserProfile extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function metaProfileType()
	{
		return $this->hasOne('MetaProfileType');
	}

}