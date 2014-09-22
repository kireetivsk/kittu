<?php

/**
 * MetaSocialNetwork
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaSocialNetwork whereOrdinal($value)
 */
class MetaSocialNetwork extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = [
		'name' 				=> 'required|max:45',
		'description' 		=> 'max:100'
	];

	//relationships
	public function crmPersonSocial()
	{
		return $this->belongsTo('CrmPersonSocial');
	}
}