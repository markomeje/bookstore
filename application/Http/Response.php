<?php declare(strict_types=1);

namespace Bookstore\Http;


final class Response {

    public function statusCode(int $code = 0) {
        return empty($code) ? http_response_code() : http_response_code($code);
    }

    public function redirect($location = '') {
    	if (!headers_sent()) {
            header('Location: '.WEBSITE_DOMAIN.$location);
        }else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.WEBSITE_DOMAIN.$location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
            echo '</noscript>';
            exit;
        }
    }

}