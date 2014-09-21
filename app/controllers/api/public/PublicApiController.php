<?php

	class PublicApiController extends ApiController
	{

		public function getIndex()
		{
			$data = [
				'test1' => 123,
				'test2' => $this
			];
			return Response::json($data);
		}

		public function saveEmail()
		{
			$data = [
				"email"				=> Input::get('email'),
				"acquired_from"		=> Input::get('acquired_from'),
				"notes"				=> Input::get('notes')
			];

			$this->load->model('Site_contact_model');
			$this->Site_contact_model->insert($data);
			$site_contact = new SiteContact();
			$site_contact->save();

			$this->data['result'] = ['success' => TRUE];
			$this->load->view('ajax', $this->data);
			return Response::json($data);

		}

		public function saveContactFrom()
		{
			$email 			= $this->input->post("email");
			$name 			= $this->input->post("name");
			$message 		= $this->input->post("message");
			$acquired_from 	= $this->input->post("acquired_from");
			$notes 			= $this->input->post("notes");

			$data = [
				"email"				=> $email,
				"name"				=> $name,
				"message"			=> $message,
				"acquired_from"		=> $acquired_from,
				"notes"				=> $notes
			];

			$this->load->model('Site_contact_model');
			$this->Site_contact_model->insert($data);

			$this->data['result'] = ['success' => TRUE];
			$this->load->view('ajax', $this->data);
		}

		public function register()
		{
			$params = $this->input->post(NULL, TRUE);

			//check for company
			$company_id = array_key_exists('company_id', $params) ? $params['company_id'] : NULL;
			$company_name = $params['company_name'];
			if (empty($company_id))
			{
				$this->load->model('Company_model');
				$params['company_id'] = $this->Company_model->addCompany($company_name);
			}

			$this->load->model("User_model");
			$user = $this->User_model->addRepUser($params);

			if ($user['status'] == 'success')
			{
				if ($params['is_referral'] == 'true')
				{
					//make referral connections
					$this->load->model('User_connection_model');
					$this->User_connection_model->makeReferralConnections($user['user_id'],
																		  $params['email'],
																		  $params['company_id']);
				}

				$this->_sendSuccess(TRUE);
			} else {
				$this->_sendError($this->Error_model->prepareAjaxError($user['message']));
			}

			$this->load->view('ajax', $this->data);

		}

		public function login()
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

		public function addTeam()
		{
			if ($this->isLoggedIn())
			{
				$email 			= $this->input->post("email");
				$relationship	= $this->input->post("relationship");
				$name       	= $this->input->post("name");

				$this->load->model("Connection_request_model");
				$result = $this->Connection_request_model->connect($email, $relationship, $name);
				if ($result)
				{
					$this->_sendSuccess(TRUE);
				} else {
					$this->_sendError($this->Error_model->prepareAjaxError("Failed to send request."));
				}
			} else
				$this->_sendSuccess($this->Error_model->prepareAjaxError("Your session expired. Please log in again."));


			$this->load->view('ajax', $this->data);

		}

		public function getSessionData()
		{
			$session_data = $this->session->all_userdata();
			$this->data['result']  = $session_data;

			$this->load->view('ajax', $this->data);
		}

		public function companySearch()
		{
			$name = $this->input->post("company_name");
			$this->load->model('Company_model');
			$this->data['result'] = $this->Company_model->partialNameSearch($name);

			$this->load->view('ajax', $this->data);
		}

		public function getNotifications()
		{
			if ($this->isLoggedIn())
			{
				$this->load->model('Notification_model');
				$notifications = $this->Notification_model->getNotifications();
				foreach ($notifications as &$notification)
					$notification->body = insertBreaks($notification->body, 38);
				$this->data['result'] = [
					'count' => count($notifications),
					'notifications' => $notifications
				];

			}
			$this->load->view('ajax', $this->data);

		}

		public function clearNotifications()
		{
			$notifications = json_decode($this->input->post("notifications"));
			foreach ($notifications as $notification)
			{
				$this->load->model('Notification_model');
				$this->Notification_model->clearNotification($notification->id);

			}
			$this->data['result']->success = TRUE;
			$this->load->view('ajax', $this->data);

		}

		public function clearNotification()
		{
			$notification = json_decode($this->input->post("notification"));

			$this->load->model('Notification_model');
			$this->Notification_model->clearNotification($notification->id);

			$this->data['result']->success = TRUE;
			$this->load->view('ajax', $this->data);

		}
	}