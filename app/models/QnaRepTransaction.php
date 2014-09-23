<?php
	use LaravelBook\Ardent\Ardent;

/**
 * QnaRepTransaction
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $qna_id
 * @property integer $meta_qna_type_id
 * @property integer $meta_qna_rep_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereQnaId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereMetaQnaTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereMetaQnaRepTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\QnaRepTransaction whereDeletedAt($value)
 * @property-read \User $user
 * @property-read \MetaQnaRepType $metaQnaRepType
 * @property-read \MetaQnaType $metaQnaType
 */
class QnaRepTransaction extends Ardent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'user_id' 					=> 'required|integer',
		'qna_id' 					=> 'required|integer',
		'meta_qna_type_id' 			=> 'required|integer',
		'meta_qna_rep_type_id' 		=> 'required|integer'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function metaQnaRepType()
	{
		return $this->hasOne('MetaQnaRepType');
	}

	public function metaQnaType()
	{
		return $this->hasOne('MetaQnaType');
	}
}