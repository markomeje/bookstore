<?php declare(strict_types=1);


namespace Bullnet\Controllers;
use Bullnet\Core\{Controller, View};
use Bullnet\Http\Request;


class AdminController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = ["title" => "Admin"];
		View::render("backend", "admin/index", $data);
	}

}


