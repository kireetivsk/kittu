<?php

/**
 * Product
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $meta_product_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Product whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Product whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Product whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\Product whereMetaProductStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Product whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Product whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Product whereDeletedAt($value) 
 */
class Product extends \Eloquent {
	protected $fillable = [];
}