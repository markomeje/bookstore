<?php

namespace Bookstore\Models;
use Bookstore\Core\{Model, Logger};
use Bookstore\Library\{Validate, Database, Session, Generate, Mailer};
use \Exception;
use Bookstore\Models\Components\Pagination;
use Bookstore\Gateways\{PaystackGateway};


class Payments extends Model {

	private $table = 'payments';

	public function __construct() {
		parent::__construct();
	}

	public function pay($data) {
		if (Session::get('isLoggedIn') === false || empty($data['user'])) {
			return ['status' => 'invalid-user'];
		}elseif (empty($data['book'])) {
			return ['status' => 'empty-book'];
		}

		try {
			$user = (new Users)->getById($data['user']);
			$book = (new Books)->getBookById($data['book']);
			$paystack = (new PaystackGateway)->initialize(["amount" => $book->price * 100, "email" => $user->email, "reference" => Generate::hash()]);

			$database = Database::connect();
			$database->prepare("INSERT INTO $this->table (user, book, amount, reference, status) VALUES(:user, :book, :amount, :reference, :status)");
			$merged = array_merge(['status' => 'initialized', 'reference' => $paystack->data->reference, 'amount' => $book->price], $data);
			$database->execute($merged);
			return ($database->rowCount() > 0) ? ['status' => 'success', 'redirect' => $paystack->data->authorization_url] : ['status' => 'error'];
		} catch (Exception $error) {
			Logger::log('PAYMENT ERROR', $error->getMessage(), $error->getFile(), $error->getLine());
			return ['status' => 'error'];
		}
	}

	public function verify($reference) {
		try {
		    $paystack = (new PaystackGateway)->verify($reference);
		    if (strtolower($paystack->data->status) !== 'success') throw new Exception("Error Verifying Paystack Transaction");
		    $database = Database::connect();
		    $database->beginTransaction();
		    $payment = self::getPaymentByReference($reference);
			if (!self::updatePaymentStatus(['status' => 'paid', 'reference' => $reference, 'user' => $payment->user])) throw new Exception('Error Updating Payment Status For User '. $payment->user);
			$book = (new Books)->getBookById($payment->book);
			$user = (new Users)->getById($payment->user);
			Mailer::mail(SEND_BOOK_AS_ATTACHMENT, $user->email, ['book' => $book->pdf]);
			$database->commit();
            return ['status' => 'success'];
		} catch (Exception $error) {
			$database->rollback();
			Logger::log("VERIFYING PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
			return ['status' => 'error'];
		}
	}

	public function updatePaymentStatus($fields) {
		try {
			$database = Database::connect();
			$database->prepare("UPDATE $this->table SET status = :status WHERE user = :user AND reference = :reference LIMIT 1");
			$database->execute($fields);
			return $database->rowCount() > 0;
		} catch (Exception $error) {
			Logger::log("UPDATING PAYMENT STATUS ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}



	public function getPaymentByReference($reference) {
		try {
			$database = Database::connect();
			$database->prepare("SELECT * FROM $this->table WHERE reference = :reference LIMIT 1");
			$database->execute(['reference' => $reference]);
            return $database->fetch();
		} catch (Exception $error) {
			Logger::log("GETTING PAYMENT DATA BY REFERENCE ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

	public function getAllPayments($pageNumber = 0) {
		try {
			$database = Database::connect();
			$pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
			$database->prepare("SELECT $this->table.*, users.email, FROM {$table}, users WHERE $this->table.user = users.id ORDER BY date DESC LIMIT {$limit} OFFSET {$offset}");
			$database->execute();
            return ["allPayments" => $database->fetchAll(), "pagination" => $pagination, "count" => $pagination->totalCount];
		} catch (Exception $error) {
			Logger::log("GETTING ALL PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
	}

}