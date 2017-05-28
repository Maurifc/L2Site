<?php
namespace app\models;
use libs\Funcoes;
use libs\DbConnector;
use libs\Auth;
use \Config;
use \PDO;

/**
* Realiza operações de banco de dados relacionado à entidade Chars
*/
class Char extends Model
{

  public function __construct(){
    parent::__construct();
  }

  /*
  | Retorna um array com todos os chars pertencentes ao login dado
  */
  public function getChars($login){

    $query = $this->pdo->prepare("SELECT
                char_name,
                pvpkills,
                pkkills,
                level,
                  (
                    SELECT
                      cl.class_name
                    FROM
                      class_list cl
                    WHERE
                      cl.id = ch.base_class
                  ) as classe
                FROM
                characters ch
                WHERE
                account_name= :login
    ");

    $query->bindParam(':login', $login);
    $query->execute();
    $chars = $query->fetchAll(\PDO::FETCH_OBJ);

    //Retirando prefixos
    foreach ($chars as $char) {
      $this->retirarPrefixos($char);
    }

    return $chars;
  }

  //Retira o prefixo (contido na coluna 'class_name' da tabela) 'class_list'
  private function retirarPrefixos($char){
    return $char->classe = explode("_", $char->classe)[1];
  }
}
