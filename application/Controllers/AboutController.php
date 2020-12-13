<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};


class AboutController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$data = ['title' => 'About'];
		View::render('frontend', 'about/index', $data);
	}

}


