<?php declare(strict_types=1);

namespace Bookstore\Core;
use Bookstore\Core\Logger;
use \Exception;


/**
 * Provide JSON interfaces similar to JavaScript's stringify and parse
 */
class Json {

    public function encode($data){
    	try {
    		if (!isset($data) || !is_array($data)) throw new Exception('Expected an object array but found none');
	        header("Content-Type: application/json; charset=UTF-8");
	        echo json_encode($data);
    	} catch (Exception $error) {
    		Logger::log("CONVERTING ARRAY TO JSON ERROR", $error->getMessage(), __FILE__, __LINE__);
    	}
        
    }

    public function decode($data){
    	try {
	        if(!isset($data) || !is_string($data)) throw new Exception('Invalid string passed for decode.');
	        return json_decode($data);
        } catch (Exception $error) {
    		Logger::log("PARSING JSON STRING TO ARRAY ERROR", $error->getMessage(), __FILE__, __LINE__);
    	}
    }
    
}