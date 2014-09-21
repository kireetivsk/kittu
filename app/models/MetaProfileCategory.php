<?php

class MetaProfileCategory extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function metaProfileType()
	{
		return $this->belongsTo('MetaProfileType');
	}

}