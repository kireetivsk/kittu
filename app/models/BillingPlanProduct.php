<?php

/**
 * BillingPlanProduct
 *
 * @property integer $id
 * @property integer $billing_item_id
 * @property integer $product_id
 * @method static \Illuminate\Database\Query\Builder|\BillingPlanProduct whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingPlanProduct whereBillingItemId($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingPlanProduct whereProductId($value) 
 */
class BillingPlanProduct extends \Eloquent {
	protected $fillable = [];
}