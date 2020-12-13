<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, Json, View};
use Bookstore\Models\Register;


class RegisterController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = ['title' => 'Register', 'captcha' => $this->getCaptcha()];
		View::render('frontend', 'register/index', $data);
	}

	public function signup() {
		if ($this->request->method('post')) {
			$email = isset($this->request->post()['email']) ? $this->request->post()['email'] : '';
			$phone = isset($this->request->post()['phone']) ? $this->request->post()['phone'] : '';
			$password = isset($this->request->post()['password']) ? $this->request->post()['password'] : '';
			$confirmpassword = isset($this->request->post()['confirmpassword']) ? $this->request->post()['confirmpassword'] : '';
			$captcha = isset($this->request->post()['captcha']) ? $this->request->post()['captcha'] : '';
			$data = ['email' => $email, 'password' => $password, 'confirmpassword' => $confirmpassword, 'phone' => $phone, 'captcha' => $captcha];
			$response = (new Register)->signup($data);
			$this->json->encode($response);
		}
	}

}


