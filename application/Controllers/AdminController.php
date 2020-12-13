<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};
use Bookstore\Http\Request;


class AdminController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = ["title" => "Admin"];
		View::render("backend", "admin/index", $data);
	}

}


