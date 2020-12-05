<?php declare(strict_types=1);


namespace Bullnet\Controllers;
use Bullnet\Core\{Controller, Json, View};
use Bullnet\Models\Login;


class LoginController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = ['title' => 'Login', 'csrf' => ''];
		View::render('frontend', 'login/index', $data);
	}

	public function signin() {
		if ($this->request->method('post')) {
			$email = isset($this->request->post()['email']) ? $this->request->post()['email'] : '';
			$password = isset($this->request->post()['password']) ? $this->request->post()['password'] : '';
			$rememberme = isset($this->request->post()['rememberme']) ? $this->request->post()['rememberme'] : '';
			$response = (new Login($email, $password, $rememberme))->signin();
			$this->json->encode($response);
		}
	}

}


