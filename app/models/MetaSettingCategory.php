<?php

class MetaSettingCategory extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function metaSettingType()
	{
		return $this->belongsTo('MetaSettingType');
	}

}