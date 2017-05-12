<?php
/*
| Arquivo de configuração
*/
class Config{
  private static $configs = [
    //Básico
    'titulo_site' => 'Título do site',

    //Outros
    'layout_padrao' => 'layouts/app.tpl.php'
  ];

  public static function get($key){
    return self::$configs[$key];
  }
}
