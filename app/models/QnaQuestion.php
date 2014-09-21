<?php

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
 */
class QnaQuestion extends \Eloquent {
	protected $fillable = [];
}