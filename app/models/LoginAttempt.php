<?php
	use LaravelBook\Ardent\Ardent;

/**
 * LoginAttempt
 *
 * @property integer $id
 * @property string $ip_address
 * @property string $login
 * @property string $time
 * @property-read \User $user
 * @method static \Illuminate\Database\Query\Builder|\LoginAttempt whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\LoginAttempt whereIpAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\LoginAttempt whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\LoginAttempt whereTime($value)
 */
class LoginAttempt extends Ardent {
	protected $fillable = [];

	const MAX_LOGIN_ATTEMPTS = 50;

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
		$attempts = $this
            ->where('ip_address', '=', Request::getClientIp())
            ->where('login', '=', $login, 'or')
            ->where('time', ">", DB::raw('DATE( DATE_SUB( NOW() , INTERVAL 1 HOUR))'))
            ->count();
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