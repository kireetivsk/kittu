<?php

class HomeController extends BaseController {

	public $_module = 'home';

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * The main home page
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
		$this->data['view'] 			= 'index';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/homeController.js";

		return View::make('template', $this->data);
	}

	/**
	 * The activation page
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getActivation()
	{
		$user_id =  Request::segment(2);
		$key =  Request::segment(3);
		$user = new User();

		$this->data['view'] 			= 'activation';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		if ($user->activate($user_id, $key)) {
			$this->data['message'] = Lang::get('general.activation_successful');
			$this->data['type'] = "success";
			return View::make('template', $this->data);
		} else {
			$this->data['message'] = Lang::get('general.activation_unsuccessful');
			$this->data['type'] = "danger";
			return View::make('template', $this->data);
		}

	}
	public function getForgotPassword()
	{
		$this->data['view'] 			= 'forgot_password';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getForgotUsername()
	{
		$this->data['view'] 			= 'forgot_username';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getLogin()
	{
		$this->data['view'] 			= 'login';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}


}
