<?php

class MetaQnaType extends \Eloquent {
	protected $fillable = [];

	//relationships
	public function qnaRepTransaction()
	{
		return $this->belongsTo('QnaRepTransaction');
	}

	public function qnacomment()
	{
		return $this->belongsTo('QnaComment');
	}

}