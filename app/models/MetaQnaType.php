<?php

/**
 * MetaQnaType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \QnaRepTransaction $qnaRepTransaction
 * @property-read \QnaComment $qnacomment
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereOrdinal($value)
 */
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