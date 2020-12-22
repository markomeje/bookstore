<?php declare(strict_types=1);


namespace Bookstore\Controllers;
use Bookstore\Core\{Controller, View};


class AboutController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$data = ['title' => 'Succcess and Motivation Book Series written by Dr. Charles O. Ukemenam helps to promote reading culture amongst the youths, particularly, Nigerians and Africans in general. | About'];
		View::render('frontend', 'about/index', $data);
	}

}


