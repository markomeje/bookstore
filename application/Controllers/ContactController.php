<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};
use Bookstore\Models\Contact;


class ContactController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$data = ['title' => 'Success and Motivation Books Series | Contact'];
		View::render('frontend', 'contact/index', $data);
	}

	public function contact() {
		if ($this->request->method('post')) {
			$email = isset($this->request->post()['email']) ? $this->request->post()['email'] : '';
			$phone = isset($this->request->post()['phone']) ? $this->request->post()['phone'] : '';
			$firstname = isset($this->request->post()['firstname']) ? $this->request->post()['firstname'] : '';
			$lastname = isset($this->request->post()['lastname']) ? $this->request->post()['lastname'] : '';
			$message = isset($this->request->post()['message']) ? $this->request->post()['message'] : '';
			$data = ['email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'phone' => $phone, 'message' => $message];
			$response = (new Contact)->contact($data);
			$this->json->encode($response);
		}
	}

}


