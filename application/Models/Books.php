<?php

namespace Bookstore\Models;
use Bookstore\Core\{Model, Logger};
use Bookstore\Library\{Validate, Database};
use \Exception;
use Bookstore\Models\Components\Pagination;


class Books extends Model {

	private $table = 'books';

	public function __construct() {
		parent::__construct();
	}

	public function addBook($data) {
		if (empty($data['title'])) {
			return ['status' => 'empty-title'];
		}elseif (empty($data['price'])) {
			return ['status' => 'empty-price'];
		}elseif (empty($data['description'])) {
			return ['status' => 'empty-description'];
		}

		try {
			$database = Database::connect();
			$database->prepare("INSERT INTO $this->table (title, price, description, status) VALUES(:title, :price, :description, :status)");
			$merged = array_merge(['status' => 'active'], $data);
			$database->execute($merged);
			return ($database->rowCount() > 0) ? ['status' => 'success'] : ['status' => 'error'];
		} catch (Exception $error) {
			Logger::log('ADDING BOOK ERROR', $error->getMessage(), __FILE__, __LINE__);
			return ['status' => 'error'];
		}
	}

	public function getAllBooks($pageNumber = 0) {
		try {
			$database = Database::connect();
			$pagination = Pagination::paginate("SELECT * FROM $this->table", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
			$database->prepare("SELECT * FROM $this->table ORDER BY date ASC LIMIT {$limit} OFFSET {$offset}");
			$database->execute();
            return ['books' => $database->fetchAll(), 'pagination' => $pagination, 'count' => $pagination->totalCount];
		} catch (Exception $error) {
			Logger::log("GETTING ALL BOOKS ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function getBookById($id) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");
			$database->execute(['id' => $id]);
            return $database->fetch();
		} catch (Exception $error) {
			Logger::log("GETTING BOOK BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function bookAlreadyExists($name) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT name FROM {$this->table} WHERE name = :name LIMIT 1");
			$database->execute(["name" => $name]);
            return $database->rowCount() > 0;
		} catch (Exception $error) {
			Logger::log("CHECKING USER EMAIL EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function deleteBook($id) {
		try {
			$book = $this->getBookById($id);
			if(empty($book)) return ['status' => 'error'];
			$file = PUBLIC_PATH . DS . 'images' . DS . 'books' . DS . $book->image;
			if (file_exists($file)) unlink($file);
			$database = Database::connect();
			$database->prepare("DELETE FROM $this->table WHERE id = :id LIMIT 1");
			$database->execute(['id' => $id]);
            return $database->rowCount() > 0 ? ['status' => 'success'] : ['status' => 'error'];
		} catch (Exception $error) {
			Logger::log("DELETING BOOK BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
			return ['status' => 'error'];
		}
	}

	public function editBook($data, $id) {
		if (empty($data['title'])) {
			return ['status' => 'empty-title'];
		}elseif (empty($data['price'])) {
			return ['status' => 'empty-price'];
		}elseif (empty($data['description'])) {
			return ['status' => 'empty-description'];
		}

		try {
			$database = Database::connect();
			$database->prepare("UPDATE $this->table SET title = :title, price = :price, description = :description WHERE id = :id LIMIT 1");
			$merged = array_merge(['id' => $id], $data);
			$database->execute($merged);
			return ($database->rowCount() > 0) ? ['status' => 'success'] : ['status' => 'error'];
		} catch (Exception $error) {
			Logger::log('EDITING BOOK ERROR', $error->getMessage(), __FILE__, __LINE__);
			return ['status' => 'error'];
		}
	}

}