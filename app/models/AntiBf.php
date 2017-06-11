<?php
namespace app\models;
use libs\Funcoes;
use libs\DbConnector;
use \Config;

/**
* Realiza operações de banco de dados relacionado à entidade Chars
*/
class AntiBf extends Model
{
  public $id;
  public $ip;
  public $login;
  public $horaBloqueio;

  //Retorna o registro de um usuário bloqueado
  public static function getBloqueado($login, $ip){
    $sql = self::getSelectSql();

    $sql .= "WHERE
              login = :login
            AND
              ip = :ip";

    $pdo = DbConnector::getConn();
    $query = $pdo->prepare($sql);
    $query->bindParam(':login', $login);
    $query->bindParam(':ip', $ip);
    $query->execute();

    $query->setFetchMode(\PDO::FETCH_CLASS, '\app\models\AntiBf');
    $resultado = $query->fetch();

    return ($resultado) ? $resultado : false;
  }

  //Retorna todos registros de bloqueio em forma de um array de objetos
  public static function getTodos(){
    $sql = self::getSelectSql();

    $pdo = DbConnector::getConn();
    $query = $pdo->prepare($sql);
    $query->execute();

    $resultado = $query->fetchAll(\PDO::FETCH_CLASS, "AntiBf");
    return $resultado;
  }

  //Adiciona um registro na lista de bloqueados
  public static function bloquear($usuario, $ip){
    $horaBloqueio = \libs\Funcoes::getDateTimeMySql();
    $sql = "INSERT INTO
              anti_bruteforce (ip, login, horaBloqueio)
            VALUES
            (:ip, :login, :hora)";

    $pdo = DbConnector::getConn();
    $ins = $pdo->prepare($sql);
    $ins->bindParam(':ip', $ip);
    $ins->bindParam(':login', $usuario);
    $ins->bindParam(':hora', $horaBloqueio);//Hora atual
    $obj = $ins->execute();
    return $obj;
  }

  //Atualiza a hora que o usuário foi bloqueado (Quando ele insiste com o login errado);
  public static function atualizarHoraBloqueio($login, $ip){
    $horaAtual = \libs\Funcoes::getDateTimeMySql();
    $sql = "UPDATE
              anti_bruteforce
            SET
              horaBloqueio = :hora
            WHERE
              login = :login
            AND
              ip = :ip";

    $pdo = DbConnector::getConn();
    $upd = $pdo->prepare($sql);
    $upd->bindParam(':hora', $horaAtual);
    $upd->bindParam(':login', $login);
    $upd->bindParam(':ip', $ip);
    $obj = $upd->execute();

    return $obj;
  }

  /*
  | Retorna a SQL usada para consulta de ips/usuarios bloqueados no banco de dados
  */
  private static function getSelectSql($usarTabelaInterna = true){

    return "SELECT
                id,
                ip,
                login,
                horaBloqueio
                FROM
                anti_bruteforce ";
  }
}
