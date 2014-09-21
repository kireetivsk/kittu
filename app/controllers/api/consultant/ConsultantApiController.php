<?php
/**
 * ConsultantApiController.php
 */

class ConsultantApiController extends ApiController
{
	public function postAddTeam()
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




	public function postGetNotifications()
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

	public function postClearNotifications()
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

	public function postClearNotification()
	{
		$notification = json_decode($this->input->post("notification"));

		$this->load->model('Notification_model');
		$this->Notification_model->clearNotification($notification->id);

		$this->data['result']->success = TRUE;
		$this->load->view('ajax', $this->data);

	}
} 