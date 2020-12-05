<?php declare(strict_types=1);


namespace Bullnet\Library;
use Bullnet\Http\Cookie;


final class Attempts {

	public function __construct() {}

	public function handle() {
		$attempts = Cookie::get(FAILED_LOGIN_ATTEMPTS_NAME);
		if ($attempts >= 5) {
			return Cookie::set(ACCESS_DENIED_KEY, $attempts, ACCESS_DENIED_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
		}else {
			(empty($attempts) || $attempts === false) ? self::setAttempts(1) : self::setAttempts($attempts++);
			return ['attempts' => $attempts];
		}
	}

	public function increment() {}

	public function setAttempts($attempts) {
		return Cookie::set(FAILED_LOGIN_ATTEMPTS_NAME, $attempts, LOGIN_ATTEMPTS_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
	}

}