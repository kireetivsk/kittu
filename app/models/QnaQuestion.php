<?php
	use LaravelBook\Ardent\Ardent;

/**
 * QnaQuestion
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property integer $votes
 * @property integer $qna_question_destination_id
 * @property integer $accepted_qna_answer_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereVotes($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereQnaQuestionDestinationId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereAcceptedQnaAnswerId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaQuestion whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaAnswer[] $qnaAnswer
 * @property-read \QnaAnswer $acceptedAnswer
 * @property-read \Illuminate\Database\Eloquent\Collection|\QnaComment[] $qnaComment
 */
class QnaQuestion extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = array(
		'user_id'						=> 'required|integer',
		'title'							=> 'required|integer',
		'content'						=> 'required',
		'votes'							=> 'required|integer',
		'qna_question_destination_id' 	=> 'required|integer',
		'accepted_qna_answer_id' 		=> 'integer'
	);

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function qnaAnswer()
	{
		return $this->hasMany('QnaAnswer');
	}

	public function acceptedAnswer()
	{
		return $this->belongsTo('QnaAnswer', 'id', 'accepted_qna_answer_id');
	}

	public function qnaComment()
	{
		return $this->hasMany('QnaComment', 'qna_id');
	}

}