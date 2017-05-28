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
  private $tabela_classes; //Armazena o nome da tabela com a lista de classes
  const TABELA_PACK = 'class_list';
  const TABELA_INTERNA = 'site_class_list';

  public function __construct(){
    parent::__construct();

    //Se estiver configurado para usar a tabela do pack...
    if(Config::get('usar_tabela_do_pack')){
      $this->tabela_classes = self::TABELA_PACK;
    } else {
      $this->tabela_classes = self::TABELA_INTERNA;
    }
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
                      ".$this->tabela_classes." cl
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
