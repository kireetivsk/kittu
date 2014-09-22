<?php

/**
 * QnaComment
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 * @property integer $qna_id
 * @property integer $meta_qna_type_id
 * @property integer $votes
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereQnaId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereMetaQnaTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereVotes($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaComment whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \MetaQnaType $metaQnaType
 * @property-read \QnaQuestion $qnaQuestion
 * @property-read \QnaAnswer $qnaAnswer
 */
class QnaComment extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = array(
		'user_id'				=> 'required|integer',
		'qna_question_id'		=> 'required|integer',
		'content'				=> 'required',
		'votes'					=> 'required|integer'
	);

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function metaQnaType()
	{
		return $this->hasOne('MetaQnaType');
	}

	public function qnaQuestion()
	{
		return $this->belongsTo('QnaQuestion', 'id', 'qna_id');
	}

	public function qnaAnswer()
	{
		return $this->belongsTo('QnaAnswer', 'id', 'qna_id');
	}


}