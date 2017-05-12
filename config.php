<?php
/*
| Arquivo de configuração
*/
class Config{
  private static $configs = [
    'titulo_site' => 'Título do site'
  ];

  public static function get($key){
    return self::$configs[$key];
  }
}
