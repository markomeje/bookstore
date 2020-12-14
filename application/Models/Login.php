<?php declare(strict_types=1);

namespace Bookstore\Models;
use Bookstore\Core\{Model};
use Bookstore\Http\Cookie;
use Bookstore\Library\{Authentication, Session};

class Login extends Model {
    

    public function __construct() {}

    public function signin($post) {
    	if (Cookie::exists(ACCESS_DENIED_KEY) === true) {
    		return ['status' => 'access-denied'];
    	}elseif (empty($post['email'])) {
    		return ['status' => 'empty-email'];
    	}elseif (empty($post['password'])) {
    		return ['status' => 'empty-password'];
    	}

        try {
            $user = (new Users)->getByEmail($post['email']);
            if (empty($user) || !password_verify($post['password'], $user->password)) {
               return ['status' => 'invalid-login']; 
            }else {
               Authentication::authenticate(['id' => $user->id, 'role' => $user->role, 'isLoggedIn' => true]);
               return strtolower(Session::get('role')) === 'admin' ? ['status' => 'success', 'redirect' => WEBSITE_DOMAIN.'/dashboard'] : ['status' => 'success', 'redirect' => ''];
            } 
        } catch (Exception $error) {
            Logger::log("USER SIGNIN ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}