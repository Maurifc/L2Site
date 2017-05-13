<?php
//Importa as configurações
require_once('config.php');

/**
 * Realiza a conexão com o banco MySQL
 */
class MysqliConnector
{
  //Informações para realizar a conexão
  private $servidor;
  private $usuario;
  private $senha;
  private $nomeBanco;

  //Objeto da conexão
  private $conn;

  function __construct()
  {
    $this->servidor = Config::get('database_servidor');
    $this->usuario = Config::get('database_usuario');
    $this->senha = Config::get('database_senha');
    $this->nomeBanco = Config::get('database_nome');
    $conn = null;
  }

  public function getConn(){
    if($this->conn === null){
      $this->conn = new mysqli($this->servidor, $this->usuario,
                                  $this->senha, $this->nomeBanco);
      if (mysqli_connect_errno())
        throw new Exception("Erro ao se conectar ao BD: \n"
                                          .mysqli_connect_error());

    }

    return $this->conn;
  }
}
