<?php declare(strict_types=1);

namespace Bookstore\Models;
use Bookstore\Core\{Model, Logger};
use Bookstore\Http\Cookie;
use Bookstore\Library\{Validate, Session, Generate, Mailer, Database};
use \Exception;

class Contact extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function contact($post) {
        if (empty($post['firstname']) || !Validate::range($post['firstname'], 3, 55)) {
            return ['status' => 'invalid-firstname'];
        }elseif (empty($post['lastname']) || !Validate::range($post['lastname'], 3, 55)) {
            return ['status' => 'invalid-lastname'];
        }elseif (empty($post['email']) || !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    		return ['status' => 'invalid-email'];
        }elseif (empty($post['phone'])) {
            return ['status' => 'invalid-phone'];
    	}elseif (empty($post['message']) || !Validate::range($post['message'], 5, 500)) {
    		return ['status' => 'invalid-message'];
        }

        try {
            $data = ['firstname' => $post['firstname'], 'lastname' => $post['lastname'], 'email' => $post['email'], 'message' => $post['message'], 'phone' => $post['phone']];
            Mailer::mail(CONTACT_EMAIL_REQUEST, ADMIN_EMAIL, $data);
            return ['status' => 'success'];
        } catch (Exception $error) {
            Logger::log('SENDING CONTACT MESSAGE ERROR', $error->getMessage(), __FILE__, __LINE__);
            return ['status' => 'error'];
        }
    }

}