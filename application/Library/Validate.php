<?php

namespace Bookstore\Library;

class Validate {

    public static function range($input, $minimum, $maximum){
    	$range = mb_strlen($input, 'utf8');
        return ($range >= (int)$minimum && $range <= (int)$maximum);
    }

    public static function minimum($input, $minimum) {
    	$input = mb_strlen($input, 'utf8');
        return ($input >= (int)$minimum); 
    }

}