<?php
/**
 * constants.php
 */
	/*
		|--------------------------------------------------------------------------
		| User defined constants
		|--------------------------------------------------------------------------
		|
		|
		|
		*/

	define('DS', '/');

	define('IMG_DIR', '/img');

	define('JS_DIR', '/js');
	define('JS_LIB_DIR', JS_DIR . '/libraries');
	define('JS_APP_DIR', '/app');
	define('JS_CONTROLLER_DIR', JS_APP_DIR . '/controllers');

	define('CSS_DIR', '/css');

	define('ACE_DIR', '/ace');

	define('VIEWS_DIR', app_path() .'/views');
	define('PARTIALS_DIR', VIEWS_DIR . '/partials');

	define('SITE_NAME', 'DirectSalesKit.com');
	define('SITE_TITLE', 'DirectSalesKit.com - Tools to manage your time, manage your team, and manage your business.');
	define('SITE_DESCRIPTION', 'DirectSalesKit.com is what your direct sales back office SHOULD be.');
	define('SITE_KEYWORDS', 'direct sales, direct sales kit, direct sales backoffice');

	define('REGISTRATION_EMAIL', 'registrations@directsaleskit.com');
	define('NOREPLY_EMAIL', 'noreply@directsaleskit.com');

	define('AVATAR_FOLDER', '/avatars');
	define('AVATAR_DEFAULT_FILENAME', 'default.png');
	define('S3_URL', 'https://s3-us-west-2.amazonaws.com/dskapp');

	define('MAX_UPLOAD_SIZE', 10000000);