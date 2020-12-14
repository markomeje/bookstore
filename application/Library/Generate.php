<?php

namespace Bookstore\Library;

class Generate {

    public static function hash($unique = "") {
        $unique = empty($unique) ? time() : $unique;
        $hash = hash("sha256", $unique);
        return str_shuffle($hash);
    }

	public static function string($size = "") {
		$string = str_shuffle(md5(mt_rand().time()).uniqid());
		return empty($size) ? substr($string, 0, (int)10) : substr($string, 0, (int)$size);
	}

	public static function salt($length) {
        $salt = "";
        $charset = "@/\\][{}\'\";:?.>,<!#%^&*()-_=+|";
        for ($i = 0; $i < $length; $i++) {
            $salt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }
        return $salt;
    }
	
}