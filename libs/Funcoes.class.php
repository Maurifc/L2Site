<?php
namespace libs;

/**
 * Funções diversas
 */
class Funcoes
{

  //Previne SQL Injection e XSS
  public static function tString($string){
    return addslashes(htmlentities(utf8_decode(trim($string))));
  }

  //Codifica a senha de acordo com o aceito pelo L2j
  public static function criptografar($senha){
    return base64_encode(pack("H*", sha1(utf8_encode($senha))));
  }

  //Retorna a hora atual no formato DateTime do MYSQL
  public static function getDateTimeMySql(){
    return date('Y-m-d H:i:s');
  }

}
