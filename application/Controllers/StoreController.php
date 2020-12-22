<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};
use Bookstore\Models\Books;
use Bookstore\Http\Cookie;


class StoreController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allBooks = (new Books)->getAllBooks($pageNumber);
		$data = ['title' => 'Buy Success And Motivation Book Series.', 'allBooks' => $allBooks['books']];
		View::render('frontend', 'store/index', $data);
	}

	public function book($id) {
		Cookie::set('book', $id, time() + BOOK_TRACKER_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
		$book = (new Books)->getBookById($id);
		$title = isset($book->title) ? $book->title : '' ;
		$data = ['title' => $title .' | Dr Charles O. Ukemenam', 'book' => $book, 'redirect' => WEBSITE_DOMAIN.'/store/book/'.$id];
		View::render('frontend', 'store/book', $data);
	}

}


