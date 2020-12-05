<?php declare(strict_types=1);


namespace Bullnet\Controllers;
use Bullnet\Core\{Controller, View};
use Bullnet\Http\Request;


class HomeController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = ["title" => "Home | VTURefill"];
		View::render("frontend", "home/index", $data);
	}

}


