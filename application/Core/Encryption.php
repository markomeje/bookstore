<?php

namespace Bookstore\Core;


class Encryption {


    private static $algorithm = 'aes-256-cbc';
 

    // public static function encrypt($data, $iv, $key){
    //     $cipherText = trim(base64_encode(openssl_encrypt($data, 'AES-128-CBC', $key, true, $iv)));
    //     unset($data, $iv, $key);
    //     return $cipherText;
    // }

    // public static function decrypt($data, $iv, $key){
    //     $cipherText = trim(base64_decode(openssl_decrypt($data, 'AES-128-CBC', $key, true, $iv)));
    //     unset($data, $iv, $key);
    //     return $cipherText;
    // }

    public static function encrypt($data, $key, $iv = false) {
        $cipherText = openssl_encrypt($data, self::$algorithm, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($cipherText);
    }

    public static function decrypt($data, $key, $iv = false) {
        $cipherText = base64_decode($data);
        $decrypted = openssl_decrypt($cipherText, self::$algorithm, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }

}