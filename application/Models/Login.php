<?php declare(strict_types=1);

namespace Bookstore\Models;
use Bookstore\Core\{Model};
use Bookstore\Http\Cookie;
use Bookstore\Library\{Authentication, Session};

class Login extends Model {
    

    public function __construct() {}

    public function signin($post) {
        $user = (new Users)->getByEmail($post['email']);
    	if (empty($post['email'])) {
    		return ['status' => 'empty-email'];
        }elseif (empty($post['password'])) {
            return ['status' => 'empty-password'];
        }elseif (empty($user) || $user === false) {
            return ['status' => 'invalid-user'];
        }elseif (!password_verify($post['password'], $user->password)) {
               return ['status' => 'invalid-login'];
        }elseif (isset($user->status) && strtolower($user->status) === 'inactive') {
            return ['status' => 'inactive-account'];
    	}

        try {
           Authentication::authenticate(['id' => $user->id, 'role' => $user->role, 'isLoggedIn' => true]);
           $referer = (strpos(REFERER, HOST) !== false && strpos(REFERER, '/login') === 0) ? REFERER : '/store';
           $redirect = strtolower(Session::get('role')) === 'admin' ? '/dashboard' : $referer;
           return ['status' => 'success', 'redirect' => $redirect]; 
        } catch (Exception $error) {
            Logger::log("USER SIGNIN ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}