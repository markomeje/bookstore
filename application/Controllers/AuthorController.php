<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};


class AuthorController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$data = ['title' => 'Dr. Charles O. Ukemenam is a retired Banker, Finanacial and Management Consultant. He holds both Masters and Doctoral Degrees from the University of Benin, Edo State Nigeria. He is also a Fellow of the Chartered Institute of Bankers (FCIB), London and Nigeria respectively; Member, the Institute of Management Consultants of Nigeria, IMCON, etc.'];
		View::render('frontend', 'author/index', $data);
	}

}


