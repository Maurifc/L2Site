<?php
namespace libs;
use \PDO;
/**
 * Classe responsável por efetuar Login e Logoff de usuários
 * No banco de dados MySQL
 */
class Auth
{

  /*
  | Recebe um usuário e senha como parâmetro e retorna true
  | caso eles se correspondam
  */
  public static function login($usuario, $senha){
    //Verifica se o IP do usuário não está bloqueado
    if(AntiBruteforce::loginBloqueado($usuario)){
      return false;
    }

    $senhaCriptografada = base64_encode(pack("H*",
                                        sha1(utf8_encode($senha))));
    //Pega a conexão e monta a query de busca
    $pdo = DbConnector::getConn();
    $sql = $pdo->prepare("SELECT * FROM accounts WHERE login= :login AND password= :senha");
    $sql->bindParam(':login', $usuario);
    $sql->bindParam(':senha', $senhaCriptografada);

    //Executa a query
    $sql->execute();

    //Se encontrou a combinação, então loga o usuário
    if($sql->fetch(PDO::FETCH_ASSOC)){
      $_SESSION['usuario'] = $usuario;
      AntiBruteforce::limparFalhas($usuario);
      return true;
    } else {
      AntiBruteforce::addFalha($usuario);
    }

    return false;
  }

  public static function logout(){
    unset($_SESSION['usuario']);
    session_destroy();

    return true;
  }

  //Retorna true caso o usuário esteja autenticado
  public static function isAutenticado(){
    return isset($_SESSION['usuario']);
  }

  //Retorna o nome do usuário autenticado no momento
  public static function usuario(){
    return ($_SESSION['usuario']) ? $_SESSION['usuario'] : false;
  }
}
