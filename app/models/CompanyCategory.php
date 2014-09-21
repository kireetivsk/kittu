<?php

/**
 * CompanyCategory
 *
 * @property integer $id
 * @property string $name
 * @property boolean $active
 * @method static \Illuminate\Database\Query\Builder|\CompanyCategory whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyCategory whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyCategory whereActive($value) 
 */
class CompanyCategory extends \Eloquent {
	protected $fillable = [];
}