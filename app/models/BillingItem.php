<?php

/**
 * BillingItem
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $billing_frequency
 * @property boolean $active
 * @property string $start_time
 * @property string $end_time
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem wherePrice($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereBillingFrequency($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereActive($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereStartTime($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereEndTime($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\BillingItem whereDeletedAt($value) 
 */
class BillingItem extends \Eloquent {
	protected $fillable = [];
}