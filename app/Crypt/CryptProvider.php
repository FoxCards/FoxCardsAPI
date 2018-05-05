<?php

namespace App\Crypt;

class CryptProvider {
	function __construct(){
		$this->cryptor = new \RNCryptor\RNCryptor\Decryptor;
	}

	function decrypt($data){
		$password = env('APP_CRYPT_KEY');
		return $this->cryptor->decrypt($data,$password);
	}
}