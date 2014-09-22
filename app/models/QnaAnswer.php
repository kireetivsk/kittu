<?php

/**
 * QnaAnswer
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $qna_question_id
 * @property string $content
 * @property integer $votes
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereQnaQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereVotes($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaAnswer whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \QnaQuestion $qnaQuestion
 * @property-read \QnaQuestion $acceptedAnswer
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaComment[] $qnaComment
 */
class QnaAnswer extends \Eloquent {
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

	public function qnaQuestion()
	{
		return $this->belongsTo('QnaQuestion');
	}

	public function acceptedAnswer()
	{
		return $this->belongsTo('QnaQuestion', 'accepted_qna_answer_id');
	}

	public function qnaComment()
	{
		return $this->hasMany('QnaComment', 'qna_id');
	}
}