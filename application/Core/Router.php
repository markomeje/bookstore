<?php declare(strict_types=1);

namespace Bullnet\Core;
use Bullnet\Core\{View};
use Bullnet\Exceptions\RouterException;
use Bullnet\Http\Response;


final class Router {
    
    public $controller;
    public $method;
    public $arguments = [];
    public const CONTROLLERS_NAMESPACE = 'Bullnet\Controllers\\';


    public function __construct($controller, $method, $arguments) {
        $this->controller = $controller;
        $this->method = $method;
        $this->arguments = $arguments;
    }

    public function route() {
        try {
            $controller = self::CONTROLLERS_NAMESPACE.ucfirst($this->controller).'Controller';
            if (class_exists($controller) === false) throw new RouterException();
            $controller = new $controller();
            if(method_exists($controller, $this->method) === false) throw new RouterException();
            empty($this->arguments) ? $controller->{$this->method}() : call_user_func_array([$controller, $this->method], $this->arguments);
        } catch (RouterException $error) {
            var_dump($error);
            (new Response)->statusCode($error->code);
            $message = $error->getMessage();
            exit(View::render('frontend', 'codes/error', ['title' => $message, 'code' => $error->code, 'message' => $message]));
        }

    }

}
