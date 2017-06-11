<?php
namespace libs;
use \app\models\AntiBf;
use \PDO;

/**
 * Classe responsável por verificar e contabilizar falhas de login
 * e bloquear o IP do usuário que esteja tentando quebrar uma senha
 */
class AntiBruteforce
{
  /*
  * Métodos
  */
  //Adiciona +1 tentativa falha ao usuário quando ele erra a senha
  public static function addFalha($login){
    $nomeSessao = 'falha_login_'.$login;

    //Cria a sessão para contabilizar as falhas (caso ela não exista)
    if(!isset($_SESSION[$nomeSessao])){
      $_SESSION[$nomeSessao] = 1;
    } else {
      //Acrescenta a falha a aquele determinado usuário
      $_SESSION[$nomeSessao]++;

      //Bloqueia o usuário/ip caso o numero de tentativas seja 20
      if($_SESSION[$nomeSessao] >= 20){
        self::bloquear($login);
      }
    }

    return true;
  }

  //Limpa as falhas do usários (somente na sessao). Método usado após o login bem sucedido
  public static function limparFalhas($login){
    $nomeSessao = 'falha_login_'.$login;

    if(isset($_SESSION[$nomeSessao])){
      unset($_SESSION[$nomeSessao]);
    }

    return true;
  }

  //Retorna true se o usuário está bloqueado (a menos de uma hora)
  public static function usuarioBloqueado($login, $ip){
    //Verifica se o usuário e IP estão no banco de dados
    if($usuario = AntiBf::getBloqueado($login, $ip)){
      //Caso positivo, verifica se já se passou 1 hora desde o bloqueio
      $horaAtual = new \DateTime();
      $diferenca = $horaAtual->diff(new \DateTime($usuario->horaBloqueio));

      return ($diferenca->d < 1 && $diferenca->h < 1);
    } else {
      //Se ele não está no banco...
      return false;
    }
  }

  //Retorna a quantidade de falhas no login do usuario informado
  public static function getNumFalhas($login){
    $nomeSessao = 'falha_login_'.$login;
    return isset($_SESSION[$nomeSessao]) ? $_SESSION[$nomeSessao] : 0;
  }

  //Bloqueia o IP do usuário após X tentativas falhas de login
  private static function bloquear($login){
    //IP do usuário que está realizando a tentativa
    $ipUsuario = $_SERVER['REMOTE_ADDR'];

    //Se o usuário já estiver bloqueado, então atualiza a hora da tentativa
    if(self::usuarioBloqueado($login, $ipUsuario)){
      AntiBf::atualizarHoraBloqueio($login, $ipUsuario);
    } else {
      AntiBf::bloquear($login, $ipUsuario);
    }
  }


}
