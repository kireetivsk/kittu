<?php

class BaseController extends Controller {

	public function __construct()
	{
		$this->data = [
			'module' 	=> $this->_module,
			'files' 	=> new stdClass()
		];
		$this->data['files']->js 	= [];
		$this->data['files']->css 	= [];

	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function _logout()
	{
		Auth::logout();
		Session::flush();
	}

}
