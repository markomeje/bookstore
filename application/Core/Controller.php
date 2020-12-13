<?php declare(strict_types=1);

namespace Bookstore\Core;
use Bookstore\Core\Json;
use Bookstore\Http\{Request, Response};
use Bookstore\Library\Session;


class Controller {

	protected $request;
    protected $response;
    protected $json;

    public function __construct() {
    	$this->request = new Request();
        $this->response = new Response();
        $this->json = new Json();
    }

    public function getCaptcha(){
        $captcha = new \Gregwar\Captcha\CaptchaBuilder;
        $captcha->build();
        Session::set('captcha', $captcha->getPhrase());
        return $captcha;
    }

}
