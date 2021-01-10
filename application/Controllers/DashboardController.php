<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, Json, View};
use Bookstore\Library\Authentication;
use Bookstore\Models\{Books, Payments};


class DashboardController extends Controller {
	
	public function __construct() {
		parent::__construct();
		Authentication::allow('admin');
	}

	public function index($pageNumber = 0) {
		$data = ['title' => 'Books', 'allBooksCount' => (new Books)->getAllBooks($pageNumber)['count'], 'allPaymentsCount' => (new Payments)->getAllPayments($pageNumber)['count']];
		View::render('backend', 'dashboard/index', $data);
	}

}


