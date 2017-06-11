<?php
namespace app\models;
use libs\DbConnector;
/**
 * Base class Model
 * Classe não deve ser usada ou instanciada
 */
class Model
{
  protected $pdo; //Conexão com a base de dados

  function __construct()
  {
    //Realiza a conexão com o banco de dados
    $this->pdo = DbConnector::getConn();
  }
}
