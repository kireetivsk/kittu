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
 */
class QnaAnswer extends \Eloquent {
	protected $fillable = [];
}