<?php

namespace Bookstore\Models;
use Bookstore\Core\{Model, Logger};
use Bookstore\Library\{Validate, Database};
use \Exception;


class Users extends Model {


	private $table = "users";


	public function __construct() {
		parent::__construct();
	}

	public function register($data) {
		try {
			$database = Database::connect();
			$database->prepare("INSERT INTO $this->table (email, role, password, phone, status, token) VALUES(:email, :role, :password, :phone, :status, :token)");
			$database->execute($data);
			return $database->rowCount() > 0;
		} catch (Exception $error) {
			Logger::log("CREATING USER ACCOUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function getById($id) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT id, email, status, date, phone FROM {$this->table} WHERE id = :id LIMIT 1");
			$database->execute(["id" => $id]);
            return $database->fetch();
		} catch (Exception $error) {
			Logger::log("GETTING USER BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function emailExists($email) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT email FROM {$this->table} WHERE email = :email LIMIT 1");
			$database->execute(["email" => $email]);
            return $database->rowCount() > 0;
		} catch (Exception $error) {
			Logger::log("CHECKING USER EMAIL EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function getByEmail($email) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT * FROM $this->table WHERE email = :email LIMIT 1");
			$database->execute(["email" => $email]);
            return $database->fetch();
		} catch (Exception $error) {
			Logger::log("GETTING USER BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

}