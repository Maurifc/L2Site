<?php
//Previne SQL Injection e XSS
function tString($string){
  return addslashes(htmlentities(utf8_decode(trim($string))));
}

//Codifica a senha de acordo com o aceito pelo L2j
function criptografar($senha){
  return base64_encode(pack("H*", sha1(utf8_encode($senha))));
}
