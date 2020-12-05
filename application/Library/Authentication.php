<?php

namespace Bullnet\Library;
use Bullnet\Http\{Cookie, Response};
use Bullnet\Library\Session;

class Authentication {

	public function __construct() {
		if (Session::get("isLoggedIn") === false) {
			return (new Response(401, ["Location" => "/login"]))->redirect("/login");
		}
	}

	public static function authenticate($data) {
		Cookie::set(session_name(), session_id(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
		foreach ($data as $key => $value) {
			Session::set($key, $value);
		}
	}

	public static function allow($roles = []) {
		if (in_array(Session::get("role"), $roles, true) === false) {
			Session::destroy();
			Router::redirect("/login");
		}
	}

}