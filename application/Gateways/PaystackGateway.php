<?php

namespace Bookstore\Gateways;
use Bookstore\Core\Logger;
use Yabacon\Paystack;
use Yabacon\Paystack\Exception\ApiException;


class PaystackGateway {

	public $paystack;

	public function __construct() {
		$this->paystack = new Paystack('sk_test_f350cd8fedff13ddffc1ff1e12bc42b60ad62ae8');
	}

	public function initialize($data = []) {
        try{
            return $this->paystack->transaction->initialize($data);
        } catch(ApiException $error){
        	Logger::log("PAYSTACK API INITIALIZATION ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
            return false;
	    }
    }

    public function verify($reference) {
        try{
            return $this->paystack->transaction->verify(["reference" => $reference]);
        } catch(ApiException $error){
        	Logger::log("PAYSTACK API VERIFICASTION ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
            return false;
	    }
    }

}