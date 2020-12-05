<?php declare(strict_types=1);

namespace Bullnet\Core;
use Bullnet\Core\Json;
use Bullnet\Http\{Request, Response};


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
        $captcha = new Gregwar\Captcha\CaptchaBuilder;
        $captcha->build();
        Session::set('captcha', $captcha->getPhrase());
        return $captcha;
    }

}
