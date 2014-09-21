<?php

	class ApiController extends BaseController
	{
		public function __construct()
		{
			$this->data = [
				'success' 	=> FALSE,
				'code' 		=> 404,
				'message' 	=> [],
				'results'	=> []
			];

		}


	}