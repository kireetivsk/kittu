<?php

/**
 * MetaQnaRepType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $points
 * @property integer $ordinal
 * @property-read \QnaRepTransaction $qnaRepTransaction
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaRepType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaRepType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaRepType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaRepType wherePoints($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaRepType whereOrdinal($value)
 */
class MetaQnaRepType extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100',
		'points'			=> 'required|integer'
	];

	//relationships
	public function qnaRepTransaction()
	{
		return $this->belongsTo('QnaRepTransaction');
	}


}