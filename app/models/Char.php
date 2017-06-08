<?php
namespace app\models;
use libs\Funcoes;
use libs\DbConnector;
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
    $sql = self::getSelectSql();

    $sql .= " WHERE
            account_name=:login";

    $query = $this->pdo->prepare($sql);

    $query->bindParam(':login', $login);
    $query->execute();
    $chars = $query->fetchAll(\PDO::FETCH_OBJ);

    //Retirando prefixos
    foreach ($chars as $char) {
      self::retirarPrefixos($char);
    }

    return $chars;
  }

  //Retira o prefixo (contido na coluna 'class_name' da tabela) 'class_list'
  private static function retirarPrefixos($char){
    return $char->classe = explode("_", $char->classe)[1];
  }

  /*
  | Retorna um array com os chars top pvp
  | A quantidade máxima deve ser informado no parâmetro $limite
  */
  public static function getTopPvp($l=null){
    $limite = ($l != null) ? $l : Config::get('max_top_pvp_pk');

    $sql = self::getSelectSql();

    $sql .= " ORDER BY pvpkills DESC";

    if($limite != null && $limite > 0){
      $sql .= " LIMIT ".$limite;
    }
    $pdo = \libs\DbConnector::getConn();
    $query = $pdo->prepare($sql);

    $query->execute();
    $chars = $query->fetchAll(\PDO::FETCH_OBJ);

    //Retirando prefixos
    foreach ($chars as $char) {
      self::retirarPrefixos($char);
    }

    return $chars;
  }

  public static function getTopPk($l=null){
    $limite = ($l != null) ? $l : Config::get('max_top_pvp_pk');

    $sql = self::getSelectSql();

    $sql .= " ORDER BY pkkills DESC";

    if($limite != null && $limite > 0){
      $sql .= " LIMIT ".$limite;
    }
    $pdo = \libs\DbConnector::getConn();
    $query = $pdo->prepare($sql);

    $query->execute();
    $chars = $query->fetchAll(\PDO::FETCH_OBJ);

    //Retirando prefixos
    foreach ($chars as $char) {
      self::retirarPrefixos($char);
    }

    return $chars;
  }

  //Retorna os characters heroes
  public static function getHeroes(){
    $sql = self::getSelectSql();
    //Verificamos o nome da coluna que contém o id do char em ambas tabelas
    $colIdChar = Config::get('coluna_idChar_tabela_characters');
    $colIdCharHeroes = Config::get('coluna_idChar_tabela_heroes');

    $sql .= "INNER JOIN
              heroes
              ON
              heroes.".$colIdCharHeroes." = ch.".$colIdChar.
              " ORDER BY ch.char_name";

    $pdo = \libs\DbConnector::getConn();
    $query = $pdo->prepare($sql);

    $query->execute();
    $chars = $query->fetchAll(\PDO::FETCH_OBJ);

    //Retirando prefixos
    foreach ($chars as $char) {
      self::retirarPrefixos($char);
    }

    return $chars;
  }

  /*
  | Retorna a SQL usada para consulta de chars no banco de dados
  | Se o parâmetro $usarTabelaInterna for igual a true, a busca das classes dos chars
  | será realizada na tabela classe que acompanha o site senão, a busca acontecerá
  | na tabela Class_list do próprio pack
  */
  private static function getSelectSql($usarTabelaInterna = true){

    $tabela = (Config::get('usar_tabela_class_do_pack')) ? 'class_list' : 'site_class_list' ;

    $sql= "SELECT
                ch.char_name,
                ch.pvpkills,
                ch.pkkills,
                ch.level,
                  (
                    SELECT
                      cl.class_name
                    FROM
                      ".$tabela." cl
                    WHERE
                      cl.id = ch.base_class
                  ) as classe,
                  (
                    SELECT
                      clan.clan_name
                    FROM
                      clan_data clan
                    WHERE
                      clan.clan_id = ch.clanid
                  ) as clan
                FROM
                characters ch ";

    return $sql;
  }
}
