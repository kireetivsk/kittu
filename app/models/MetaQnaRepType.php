<?php

class MetaQnaRepType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function qnaRepTransaction()
	{
		return $this->belongsTo('QnaRepTransaction');
	}


}