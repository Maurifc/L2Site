<?php
session_start();

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
    try{
      $senhaCriptografada = base64_encode(pack("H*",
                                          sha1(utf8_encode($senha))));
      //Pega a conexão e monta a query de busca
      $pdo = DbConnector::getConn();
      $sql = $pdo->query('SELECT count("login") FROM accounts WHERE login=":usuario" AND password=":senha"');
      $sql->bindParam(':usuario', $usuario);
      $sql->bindParam(':senha', $senhaCriptografada);

      //Executa a query
      $sql->execute();

      if($sql->rowCount() === 1){
        $_SESSION['usuario'] = $usuario;
        return true;
      }
    } catch (Exception $e){
      echo $e;
    }
    return false;
  }

  public static function logout(){
    unset($_SESSION['usuario']);
    session_destroy();

    return true;
  }

  public static function isAutenticado(){
    return isset($_SESSION['usuario']);
  }
}
