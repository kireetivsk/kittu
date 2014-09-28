<?php
	use LaravelBook\Ardent\Ardent;

class LoginAttempt extends Ardent {
	protected $fillable = [];

	const MAX_LOGIN_ATTEMPTS = 5;

	//validation
	public static $rules = [
		'ip_address' 						=> 'required|ip',
		'login'								=> 'required|max:40'
	];

	//relationships
	public function user()
	{
		return $this->belongsTo('User', 'email', 'login');
	}

	public function canLogin($login)
	{
		$attempts = $this->where('ip_address', '=', Request::getClientIp())->where('login', '=', $login, 'or')->count();
		return $attempts >= self::MAX_LOGIN_ATTEMPTS ? FALSE : TRUE;
	}

	public function addStrike($login)
	{
		$this->insert(['login' => $login, 'ip_address' => Request::getClientIp()]);
	}

	public function clearStrikes($login)
	{
		$this->where('login', '=', $login)->where('ip_address', '=', Request::getClientIp(), 'or')->delete();
	}

}