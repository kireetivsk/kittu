<?php

	class PublicApiController extends ApiController
	{

		/**
		 * saves an email address as a contact
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postSaveEmail()
		{
			$data = [
				"email"				=> Input::get('email'),
				"acquired_from"		=> Input::get('acquired_from'),
				"notes"				=> Input::get('notes')
			];

			$site_contact = new SiteContact();

			if($site_contact->create($data))
				$this->_success("Saved");
			else
				$this->_error(500, 'Failed to save');

			return Response::json($this->data);

		}

		/**
		 * Returns session userdata
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postGetSessionData()
		{
			if(Session::has('userdata'))
			{
				$session_data = Session::get('userdata');
				$this->_success("Success", $session_data);
			} else
				$this->_error(500, 'Failed to get userdata');

			return Response::json($this->data);
		}


		/**
		 * Saves the contact from a form
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postSaveContactFrom()
		{

			$data = [
				"email"				=> Input::get('email'),
				"name"				=> Input::get('name'),
				"message"			=> Input::get('message'),
				"acquired_from"		=> Input::get('acquired_from'),
				"notes"				=> Input::get('notes')
			];

			$site_contact = new SiteContact();

			if($site_contact->create($data))
				$this->_success("Saved");
			else
				$this->_error(500, 'Failed to save');

			return Response::json($this->data);
		}

		/**
		 * Find a company name based on a partial name search
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postCompanySearch()
		{
			$name = Input::get('company_name');
			$company = new Company();
			$companies = $company->partialNameSearch($name);
			if(!empty($companies))
				$this->_success("Found", $companies);
			else
				$this->_error(500, 'No company found');

			return Response::json($this->data);
		}



		public function postRegister()
		{
			$params = Input::all();

			//check for company
			$company_id 	= array_key_exists('company_id', $params) ? $params['company_id'] : NULL;
			$company_name 	= $params['company_name'];
			if (empty($company_id))
			{
				$company = new Company();
				if (!$params['company_id'] = $company->addByName($company_name))
				{
					$this->_error(500, 'Company name invalid');
					return Response::json($this->data);
				}
			}

			$user = new User();
			if ($user_id =$user->consultantRegistration($params))
			{
				if ($params['is_referral'] == 'true')
				{
					//make referral connections
					UserConnection::makeReferralConnections($user['user_id'],
															  $params['email'],
															  $params['company_id']);
				}

				$this->_success("Registered");
			} else {
				$this->_error(500, 'Failed to register');
			}

			return Response::json($this->data);

		}

		public function postLogin()
		{
			if ($this->tank_auth->is_logged_in())
				$this->data['result']->success = TRUE;
			else {
				$params = $this->input->post(NULL, TRUE);
				if (empty($params['email']) || empty($params['password']))
					$this->_sendError($this->Error_model->prepareAjaxError("auth_missing"));
				else {
					//can login?
					if ($this->_canLogIn($params['email']))
					{
						//process login
						if ($this->tank_auth->login($params['email'], $params['password'], 0, 0, 1))
						{
							$this->data['result']->success = TRUE;

							//get user info and set it to the session
							$this->load->model('User_model');
							$user = $this->User_model->loadUserData($this->tank_auth->get_user_id());

							//load settings
							$this->load->model('User_setting_model');
							$user['settings'] = $this->User_setting_model->getUserSettings($user['id']);
							$user['current'] = [
								'company' => $user['settings']['Last selected company']->value
							];

							$this->session->set_userdata($user);

						} else {
							$tankauth_error_codes = $this->tank_auth->get_error_message();
							$error_codes = [];
							if (!empty($tankauth_error_codes))
								foreach ($tankauth_error_codes as $error_code)
								{
									$error_codes[] = $error_code;
								}
							$this->_sendError($this->Error_model->prepareAjaxError($error_codes));
						}
					} else {
						$this->_sendError($this->Error_model->prepareAjaxError("auth_max_logins"));
					}
				}
			}
			$this->load->view('ajax', $this->data);
		}




	}