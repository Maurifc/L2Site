<?php
//Importa as configurações
require_once('config.php');

/**
* Realiza a conexão com o banco MySQL
*/
class DbConnector
{
  //Objeto da conexão
  private static $conn;

  public static function getConn(){
    if(self::$conn === null){
      $servidor = Config::get('database_servidor');
      $usuario = Config::get('database_usuario');
      $senha = Config::get('database_senha');
      $nomeBanco = Config::get('database_nome');

      try{
        self::$conn = new PDO('mysql:host='.$servidor.';port=3306;dbname='.$nomeBanco,$usuario,$senha,
        array(PDO::ATTR_PERSISTENT => true));
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $e){
        throw $e;
      }
    }

    return self::$conn;
  }
}
