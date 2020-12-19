<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, Json, View};
use Bookstore\Models\Login;


class LoginController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = ['title' => 'Login'];
		View::render('frontend', 'login/index', $data);
	}

	public function signin() {
		if ($this->request->method('post')) {
			$email = isset($this->request->post()['email']) ? $this->request->post()['email'] : '';
			$password = isset($this->request->post()['password']) ? $this->request->post()['password'] : '';
			$redirect = isset($this->request->get()['redirect']) ? $this->request->get()['redirect'] : '';
			$data = ['email' => $email, 'password' => $password, 'redirect' => $redirect];
			$response = (new Login)->signin($data);
			$this->json->encode($response);
		}
	}

}


