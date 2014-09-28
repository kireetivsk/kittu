<?php

class PublicController extends \BaseController {

	public $_module = 'public';

	public function getAbout()
	{
		$this->data['view'] 			= 'about';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getAdvertiser()
	{
		$this->data['view'] 			= 'advertiser';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getCompany()
	{
		$this->data['view'] 			= 'company';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getCompanyDirectory()
	{
		$this->data['view'] 			= 'company_directory';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getCompanyFinder()
	{
		$this->data['view'] 			= 'company_finder';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getConsultantFinder()
	{
		$this->data['view'] 			= 'consultant_finder';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getConsultant()
	{
		return Redirect::to('features');
	}

	public function getConsumer()
	{
		$this->data['view'] 			= 'consumer';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getContact()
	{
		$this->data['view'] 			= 'contact';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getFeatures()
	{
		$this->data['view'] 			= 'features';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getIndustryNews()
	{
		$this->data['view'] 			= 'industry_news';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getPlans()
	{
		$this->data['view'] 			= 'plans';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getPress()
	{
		$this->data['view'] 			= 'press';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getPrivacy()
	{
		$this->data['view'] 			= 'privacy';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getRecruit()
	{
		$this->data['view'] 			= 'recruit';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getRefundPolicy()
	{
		$this->data['view'] 			= 'refund_policy';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getServiceProvider()
	{
		$this->data['view'] 			= 'service_provider';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getSupport()
	{
		$this->data['view'] 			= 'support';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

	public function getTerms()
	{
		$this->data['view'] 			= 'terms';
		$this->data['files']->js[] 		= JS_CONTROLLER_DIR . "/public/publicController.js";

		return View::make('template', $this->data);
	}

}