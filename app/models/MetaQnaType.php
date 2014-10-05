<?php
	use LaravelBook\Ardent\Ardent;

/**
 * MetaQnaType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \QnaRepTransaction $qnaRepTransaction
 * @property-read \QnaComment $qnaComment
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaQnaType whereOrdinal($value)
 */
class MetaQnaType extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function qnaRepTransaction()
	{
		return $this->hasOne('QnaRepTransaction');
	}

	public function qnaComment()
	{
		return $this->hasOne('QnaComment');
	}

}