<?php
/*
| Arquivo de configuração
*/
class Config{
  private static $configs = [
    //Básico
    'titulo_site' => 'Título do site',

    //MySQL
    'database_servidor' => 'localhost', //Endereço do servidor MySQL
    'database_usuario' => 'root',
    'database_senha' => 'root',
    'database_nome' => 'l2java',

    //Outros
    'layout_padrao' => 'layouts/app.tpl.php'
  ];

  public static function get($key){
    return self::$configs[$key];
  }
}
