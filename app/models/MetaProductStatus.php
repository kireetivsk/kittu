<?php

	class MetaProductStatus extends \Eloquent
	{
		protected $fillable = [];

		//relationships
		public function product()
		{
			return $this->belongsTo('Product');
		}

	}