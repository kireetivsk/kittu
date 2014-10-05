<?php
	/**
	 * This is the view that is loaded when a user session expires. It is called with
	 *        App::abort(401);
	 *
	 * set a flash var to get a message to show
	 *        Session::flash('message', trans('general.not_authorized'));
	 */

	$files       = new stdClass();
	$files->js   = [];
	$files->js[] = JS_CONTROLLER_DIR . "/public/homeController.js";

	require_once(PARTIALS_DIR . DS . "header.php");
	require_once(VIEWS_DIR . DS . "home/header.php");
	require_once(VIEWS_DIR . DS . "home/404.php");
	require_once(VIEWS_DIR . DS . "home/footer.php");
	require_once(PARTIALS_DIR . DS . "footer.php");