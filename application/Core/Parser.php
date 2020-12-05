<?php declare(strict_types=1);

namespace Bullnet\Core;
use Bullnet\Http\{Request, Response};
use Bullnet\Core\Router;
use Bullnet\Exceptions\ParserException;


final class Parser {

    public $router;

    public function __construct(Request $request) {
        try {
            $route = isset($request->get()['route']) ? $request->get()['route'] : '';
            $url = empty($route) ? [] : (array)explode('/', filter_var(rtrim(strtolower($route), '/'), FILTER_SANITIZE_URL));
            $controller = (isset($url[0]) && $url[0] !== '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
            array_shift($url);
            $method = (isset($url[0]) && $url[0] !== '') ? $url[0] : DEFAULT_METHOD;
            array_shift($url);
            $arguments = empty($url) ? '' : array_values($url);
            $this->router = new Router($controller, $method, $arguments);
        } catch (ParserException $error) {
            (new Response)->statusCode($error->code);
            $message = $error->getMessage();
            exit(View::render('frontend', 'codes/error', ['title' => $message, 'code' => $error->code, 'message' => $message]));
        }
    }

}