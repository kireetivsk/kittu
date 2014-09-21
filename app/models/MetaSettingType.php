<?php

class MetaSettingType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function userSetting()
	{
		return $this->belongsTo('UserSetting');
	}
	public function metaSettingCategroy()
	{
		return $this->hasOne('MetaSettingCategory');
	}
}