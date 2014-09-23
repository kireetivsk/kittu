<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	//api
	//public
	Route::controller('publicapi', 			'PublicApiController');

	//public
	Route::get('about', 					'PublicController@getAbout');
	Route::get('advertiser', 				'PublicController@getAdvertiser');
	Route::get('company', 					'PublicController@getCompany');
	Route::get('company_directory', 		'PublicController@getCompanyDirectory');
	Route::get('company_finder', 			'PublicController@getCompanyFinder');
	Route::get('consultant_finder', 		'PublicController@getConsultantFinder');
	Route::get('consultant', 				'PublicController@getConsultant');
	Route::get('consumer', 					'PublicController@getConsumer');
	Route::get('contact', 					'PublicController@getContact');
	Route::get('features', 					'PublicController@getFeatures');
	Route::get('forgot_password', 			'PublicController@getForgotPassword');
	Route::get('forgot_username', 			'PublicController@getForgotUsername');
	Route::get('industry_news', 			'PublicController@getIndustryNews');
	Route::get('login', 					'PublicController@getLogin');
	Route::get('plans', 					'PublicController@getPlans');
	Route::get('press', 					'PublicController@getPress');
	Route::get('privacy', 					'PublicController@getPrivacy');
	Route::get('recruit', 					'PublicController@getRecruit');
	Route::get('refund_policy', 			'PublicController@getRefundPolicy');
	Route::get('service_provider', 			'PublicController@getServiceProvider');
	Route::get('support', 					'PublicController@getSupport');
	Route::get('terms', 					'PublicController@getTerms');

	Route::get('activation', 				'HomeController@getActivation');

	//home
	Route::controller('/', 					'HomeController');

