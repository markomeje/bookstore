<?php

namespace Bullnet\Models;
use Bullnet\Core\{Model, Logger};
use Bullnet\Library\{Validate, Database};
use \Exception;


class User extends Model {


	private $table = "users";
	public $id = null;


	public function __construct($id = null) {
		parent::__construct();
		$this->id = (int)$id;
	}

	public function register($posted) {
		try {
			$database = Database::connect();
			$database->prepare("INSERT INTO {$this->table} (username, email, password, phone, status) VALUES(:username, :email, :password, :phone, :status)");
			$database->execute($posted);
			return ["count" => $database->rowCount(), "id" => $database->lastInsertId()];
		} catch (Exception $error) {
			Logger::log("CREATING USER ACCOUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function getById() {
		try {
			$database = Database::connect();
			$database->prepare("SELECT id, username, email, status, date, phone FROM {$this->table} WHERE id = :id LIMIT 1");
			$database->execute(["id" => $this->id]);
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
            return $database->rowCount() > 0 ? true : false;
		} catch (Exception $error) {
			Logger::log("CHECKING USER EMAIL EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function getByEmail($email) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
			$database->execute(["email" => $email]);
            return $database->fetch();
		} catch (Exception $error) {
			Logger::log("GETTING USER BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

}