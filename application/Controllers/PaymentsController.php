<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, Json, View};
use Bookstore\Models\Payments;
use Bookstore\Library\{Session};


class PaymentsController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allPayments = (new Payments)->getAllPayments($pageNumber);
		$data = ['title' => 'Payments', 'allPayments' => $allPayments['payments']];
		View::render('backend', 'payments/index', $data);
	}

	public function pay($book) {
		if ($this->request->method('post')) {
			$data = ['book' => $book, 'user' => Session::get('id')];
			$response = (new Payments)->pay($data);
			$this->json->encode($response);
		}
	}

	public function verify() {
		$reference = isset($this->request->get()['reference']) ? $this->request->get()['reference'] : '';
		$response = (new Payments)->verify($reference);
		$data = ['title' => 'Verifying Book Payment', 'payment' => $response['status']];
		View::render('frontend', 'payments/verify', $data);
	}

}


