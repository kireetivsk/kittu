<?php

	/**
 * MetaProductStatus
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $ordinal
 * @property-read \Product $product
 * @method static \Illuminate\Database\Query\Builder|\MetaProductStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProductStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProductStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\MetaProductStatus whereOrdinal($value)
 */
class MetaProductStatus extends \Eloquent
	{
		protected $fillable = [];

		//relationships
		public function product()
		{
			return $this->belongsTo('Product');
		}

	}