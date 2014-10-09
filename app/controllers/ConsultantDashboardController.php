<?php

class ConsultantDashboardController extends BaseController {

	public $_module = 'consultant_dashboard';

	/*
	|--------------------------------------------------------------------------
	| Consultant Dashboard Controller
	|--------------------------------------------------------------------------
	||
	*/

	/**
	 * Module auth
	 */
	public function __construct()
	{
		parent::__construct();
		if (!Auth::check())
		{
			Session::flash('message', trans('general.not_authorized'));
			App::abort(401);
		}
	}

	public function getIndex()
	{
		$this->data['view']        = 'index';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/indexController.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getProfile()
	{
		$this->data['view']        = 'profile';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getSettings()
	{
		$this->data['view']        = 'settings';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getConnectionRequests()
	{
		$this->data['view']        = 'connection_requests';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/connectionRequestController.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getMyTeam()
	{
		$this->data['view']        = 'my_team';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/myTeamController.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getCrm()
	{
		$this->data['view']        = 'crm';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getGoals()
	{
		$this->data['view']        = 'goals';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getDreamboard()
	{
		$this->data['view']        = 'dreamboard';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getQna()
	{
		$this->data['view']        = 'qna';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getSocialTools()
	{
		$this->data['view']        = 'social_tools';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getAnalytics()
	{
		$this->data['view']        = 'analytics';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getMarketplace()
	{
		$this->data['view']        = 'marketplace';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getAdvertisers()
	{
		$this->data['view']        = 'advertisers';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getBlog()
	{
		$this->data['view']        = 'blog';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getMarketing()
	{
		$this->data['view']        = 'marketing';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeads()
	{
		$this->data['view']        = 'leads';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}


	/**
	 * Leader Controllers
	 */
	public function getLeaderDiscussion()
	{
		$this->data['view']        = 'leader_discussion';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeaderBlog()
	{
		$this->data['view']        = 'leader_blog';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeaderFaq()
	{
		$this->data['view']        = 'leader_faq';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeaderTraining()
	{
		$this->data['view']        = 'leader_training';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeaderFiles()
	{
		$this->data['view']        = 'leader_files';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeaderImages()
	{
		$this->data['view']        = 'leader_images';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

	public function getLeaderDownline()
	{
		$this->data['view']        = 'leader_downline';
		$this->data['files']->js[] = JS_CONTROLLER_DIR . "/$this->_module/Controller.js";

		return View::make('template_consultant_dashboard', $this->data);
	}

}
