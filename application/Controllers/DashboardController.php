<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, Json, View};
use Bookstore\Library\Authentication;


class DashboardController extends Controller {
	
	public function __construct() {
		parent::__construct();
		Authentication::allow('admin');
	}

	public function index() {
		$data = ['title' => 'Books', 'csrf' => ''];
		View::render('backend', 'dashboard/index', $data);
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


