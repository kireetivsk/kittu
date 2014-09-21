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
 * @property-read \Illuminate\Database\Eloquent\Collection|\BillingItem[] $billingItem
 * @property-read \MetaProductStatus $metaProductStatus
 */
class Product extends \Eloquent {
	protected $fillable = [];

	//validation
	public static $rules = array(
		'name'                  => 'required|between:1,100',
		'description'           => 'between:1,100',
		'meta_product_status_id'=> 'required|integer'
	);

	//relationships
	public function billingItem()
	{
		return $this->belongsToMany('BillingItem');
	}

	public function metaProductStatus()
	{
		return $this->hasOne('MetaProductStatus');
	}
}