<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, Json, View};
use Bookstore\Models\Books;


class BooksController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allBooks = (new Books)->getAllBooks($pageNumber);
		$data = ['title' => 'Books', 'allBooks' => $allBooks['books']];
		View::render('backend', 'books/index', $data);
	}

	public function addBook() {
		if ($this->request->method('post')) {
			$title = isset($this->request->post()['title']) ? $this->request->post()['title'] : '';
			$price = isset($this->request->post()['price']) ? $this->request->post()['price'] : '';
			$description = isset($this->request->post()['description']) ? $this->request->post()['description'] : '';
			$data = ['title' => $title, 'price' => $price, 'description' => $description];
			$response = (new Books)->addBook($data);
			$this->json->encode($response);
		}
	}

	public function deleteBook($id) {
		if ($this->request->method('post')) {
			$response = (new Books)->deleteBook($id);
			$this->json->encode($response);
		}
	}

	public function editBook($id) {
		if ($this->request->method('post')) {
			$title = isset($this->request->post()['title']) ? $this->request->post()['title'] : '';
			$price = isset($this->request->post()['price']) ? $this->request->post()['price'] : '';
			$description = isset($this->request->post()['description']) ? $this->request->post()['description'] : '';
			$data = ['title' => $title, 'price' => $price, 'description' => $description];
			$response = (new Books)->editBook($data, $id);
			$this->json->encode($response);
		}
	}

}


