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

		/**
		 * @param string $message
		 * @param array $results
		 */
		protected function _success($message, array $results = NULL)
		{
			$this->data['success'] 	= TRUE;
			$this->data['code'] 	= 200;
			$this->data['message'] 	= $message;
			$this->data['results'] 	= $results;

		}

		/**
		 * @param int $code
		 * @param string $message
		 */
		protected function _error($code, $message)
		{
			$this->data['code'] = $code;
			$this->data['message'] = $message;

		}
	}