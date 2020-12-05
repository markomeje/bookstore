<?php declare(strict_types=1);

namespace Bullnet\Models;
use Bullnet\Models\{User};
use Bullnet\Http\Cookie;
use Bullnet\Library\{Attempts};

class Login extends User {
    
    /**
     * [User Login Email required]
     * @var [type] string
     */
    public $email;

    /**
     * [$password required]
     * @var [type] string
     */
    public $password;

    /**
     * [$rememberme optional]
     * @var [type]  string 
     */
    public $rememberme;

    /**
     * [$table Store User Login credentials]
     * @var string
     */
    private $table = 'login';

    public function __construct($email = '', $password = '', $rememberme = '') {
        $this->email = $email; 
        $this->password = $password; 
        $this->rememberme = $rememberme;
    }

    public function signin() {
    	if (Cookie::exists(ACCESS_DENIED_KEY) === true) {
    		return ['status' => 'access-denied'];
    	}elseif (empty($this->email)) {
    		return ['status' => 'empty-email'];
    	}elseif (empty($this->password)) {
    		return ['status' => 'empty-password'];
    	}

        try {
            $user = (new User)->getByEmail($this->email);
            if (!$user || !password_verify($this->password, $user->password)) return ['status' => 'invalid-user'];
        } catch (Exception $error) {
            Logger::log("USER SIGNIN ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}