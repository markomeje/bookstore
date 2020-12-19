<?php

namespace Bookstore\Library;
use Bookstore\Http\{Cookie, Response};
use Bookstore\Library\Session;

class Authentication {

	public function __construct() {}

	public static function authenticate($data) {
		Cookie::set(session_name(), session_id(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
		foreach ($data as $key => $value) {
			Session::set($key, $value);
		}
	}

	public static function allow($role) {
		if (Session::get('role') !== $role || Session::get('isLoggedIn') === false) {
			Session::destroy();
			return (new Response())->redirect('/login');
		}
	}

}