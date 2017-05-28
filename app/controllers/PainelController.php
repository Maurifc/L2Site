<?php
namespace app\controllers;
use app\models\Account;
use app\models\Char;
use libs\View;
use libs\DbConnector;
use libs\Auth;
use libs\Funcoes;

/**
 * Controla as funções do painel de controle
 */
class PainelController
{

  public function exibir(){
    if(Auth::isAutenticado()){
      //Carrega os chars do usuário
      $charModel = new Char();
      $chars = $charModel->getChars(Auth::usuario());

      //Carrega as informações da conta
      $conta = Account::get(Auth::usuario());

      //Exibe o painel depois que o usuário está autenticado
      $dados = [
        'titulo' => 'Painel de controle',
        'nome' => $conta->nome,
        'nick' => $conta->login,
        'email' =>  $conta->email,
        'chars' => $chars
      ];

      //Mostra o painel de controle, caso positivo
      View::getInstance()->mostrar('painel_controle', $dados);
    } else {
      header("Location: /index.php?r=home");
    }
  }

  //Altera a senha de uma conta (que está logada no painel de controle)
  public function alterarSenha(){
    try{
      if(Auth::isAutenticado()){
        $senhaAtual = Funcoes::tString($_POST['senhaAtual']);
        $senhaNova = Funcoes::tString($_POST['senha']);

        $usuario = $_SESSION['usuario']; //Login do usuário

        //Pega a conta correspondente ao usuario no banco de dados
        $acc = Account::get($usuario);

        //Troca a senha dessa conta
        if(!$acc->trocarSenha($senhaAtual, $senhaNova)){
          throw new \Exception('Senhas atual incorreta');
        }

        $this->exibir(); //Exibe o painel de controle
        return true;
      } else {
        throw new \Exception('Erro ao tentar alterar a senha');
      }
    } catch (\Exception $e){
      //header("Location: /index.php?r=home");
      return false;
    }
  }


}
