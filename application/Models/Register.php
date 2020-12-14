<?php declare(strict_types=1);

namespace Bookstore\Models;
use Bookstore\Core\{Model, Logger};
use Bookstore\Http\Cookie;
use Bookstore\Library\{Validate, Session, Generate, Mailer, Database};
use \Exception;

class Register extends Model {

    public function __construct() {}

    public function signup($post) {
    	if (empty($post['email']) || !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    		return ['status' => 'invalid-email'];
        }elseif ((new Users)->emailExists($post['email'])) {
            return ['status' => 'email-exists'];
        }elseif (empty($post['phone'])) {
            return ['status' => 'invalid-phone'];
    	}elseif (empty($post['password'])) {
    		return ['status' => 'empty-password'];
    	}elseif ($post['password'] !== $post['confirmpassword']) {
            return ['status' => 'unmatched-password'];
        }elseif ($post['captcha'] !== Session::get('captcha')) {
            return ['status' => 'invalid-captcha'];
        }

        try {
            $database = Database::connect();
            $token = Generate::string(25);
            $data = ['status' => 'inactive', 'role' => 'user', 'email' => $post['email'], 'password' => password_hash($post['password'], PASSWORD_DEFAULT), 'phone' => $post['phone'], 'token' => $token];
            $database->beginTransaction();
            (new Users)->register($data);
            // if(!Mailer::mail(EMAIL_VERIFICATION, $post['email'], ['token' => $token])) throw new Exception('Error Sending Mail With PHPMailer');
            $database->commit();
            return ['status' => 'success'];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log('USER SIGNUP ERROR', $error->getMessage(), __FILE__, __LINE__);
            return ['status' => 'error'];
        }
    }

}