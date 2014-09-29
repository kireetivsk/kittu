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

		/**
		 * Ajax endpoint to register a user
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
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
					//todo test this
					//make referral connections
					UserConnection::makeReferralConnections($user['user_id'], $params['email'], $params['company_id']);
				}

				$this->_success("Registered");
			} else {
				$errors = $user->errors();
				$error_display = Dsk::arrayToString($errors->all());
				$this->_error(500, 'Failed to register: ' . $error_display);
			}

			return Response::json($this->data);

		}

		/**
		 * Log a user in
		 *
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function postLogin()
		{
			$email 		= Input::get('email');
			$password 	= Input::get('password');
			if (Auth::check())
				$this->_success(TRUE);
			else {
				$login_attempt = new LoginAttempt();
				if (!$login_attempt->canLogin($email))
				{
					$this->_error(401, Lang::get('general.max_login_attempts'));
					return Response::json($this->data);
				}
				if (Auth::attempt(array('email' => $email, 'password' => $password)))
				{
					$login_attempt->clearStrikes($email);

					//load settings
                    $user = new User();
                    $settings = $user->getSettings(Auth::id());
                    Session::put('settings', $settings);

                    //set current company
                    $meta_setting_type = new MetaSettingType();
                    $current_company_id = $meta_setting_type->getLastCompanyId($settings);
                    Session::put('current', ['company' => $settings[$current_company_id]['value']]);

					$this->_success(TRUE);
				} else {
					$login_attempt->addStrike($email);
					$this->_error(401, Lang::get('general.login_failed'));
				}
			}

			return Response::json($this->data);
		}

	}