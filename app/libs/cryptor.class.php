<?php

class Cryptor
{

  private $encrypt_method = "AES-256-CBC";
//XDT-YUGHH-GYGF-YUTY-GHRGFR
   private $secret_key = "12345678901478523693216549875621";
  //private $secret_key = "C8P7sGtEoRtKvYsBnMq3tZwXu6x9zA1D";
   private $iv = "1234567890123456";
  //private $iv = openssl_random_pseudo_bytes(16);
  function encryptId($id)
  {
    $options = 0;
    $key = hash('sha256', $this->secret_key);
    $iv = substr(hash('sha256', $this->iv), $options, 16);
    $id = openssl_encrypt($id, $this->encrypt_method, $key,$options, $iv);
    $id = base64_encode($id);
     return $id;
  }
  function decryptId($id)
  {
    $id = base64_decode($id);
    $options = 0;
    $key = hash('sha256', $this->secret_key);
    $iv = substr(hash('sha256', $this->iv), $options, 16);
    $id = openssl_decrypt($id, $this->encrypt_method, $key,$options, $iv);
    return $id;
  }
}
?>