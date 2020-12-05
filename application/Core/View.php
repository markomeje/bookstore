<?php

namespace Bullnet\Core;

class View {
    /**
     * For rendering views files
     * @param  [string] $view [the path to the views folder]
     * @param  array  $data [the actual data to send to the view]
     * @return void
     * @static static method
     */
	public static function render($path, $view, $data = [], callable $next = null){
        empty($data) ? [] : extract($data);
        require VIEWS_PATH . DS . "templates" . DS . "header.php";
        require VIEWS_PATH . DS . $path . DS . $view . ".php";
        require VIEWS_PATH . DS . "templates" . DS . "footer.php";
        return $next;
    }


    /**
     * Checks if the passed string is the currently active controller.
     * Useful for handling the navigation"s active/non-active link.
     * @param string $filename
     * @param string $controller
     * @return bool Shows if the controller is used or not
     */
    public static function active($filename) {
        if (is_string($filename)) {
            $filename = explode("/", $filename);
            return isset($filename[0]) ? $filename[0] : "";
        }
    }

}