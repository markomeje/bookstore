<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};
use Bookstore\Models\Books;


class StoreController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allBooks = (new Books)->getAllBooks($pageNumber);
		$data = ['title' => 'Store', 'allBooks' => $allBooks['books']];
		View::render('frontend', 'store/index', $data);
	}

	public function book($id) {
		$data = ['title' => 'Store', 'book' => (new Books)->getBookById($id)];
		View::render('frontend', 'store/book', $data);
	}

}


