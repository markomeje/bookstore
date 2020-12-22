<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};
use Bookstore\Models\Books;


class HomeController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allBooks = (new Books)->getAllBooks($pageNumber);
		$data = ['title' => '', 'allBooks' => $allBooks['books']];
		View::render('frontend', 'home/index', $data);
	}

}


