<?php declare(strict_types=1);


namespace Bullnet\Controllers;
use Bullnet\Core\Controller;


class PagesController extends Controller {
	
	public function __construct() {
		# code...
	}

	public function home(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface {
		$body = $response->getBody();
        $body->write('web::home');
        return $response->withBody($body);
	}

}


