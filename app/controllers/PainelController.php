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
  const ACTION_FALHA_TROCAR_SENHA = 'erro';
  const ACTION_SUCESSO_TROCAR_SENHA = 'sucesso';

  public function exibir(){
    //Verifica se o usuário já está autenticado
    if(Auth::isAutenticado()){
      //Verifica se algum parâmetro do tipo action foi enviado
      $action = isset($_GET['a']) ? $_GET['a'] : null;

      //Carrega os chars do usuário
      $charModel = new Char();
      $chars = $charModel->getChars(Auth::usuario());

      //Carrega as informações da conta
      $conta = Account::get(Auth::usuario());

      //Dados para a view
      $dados = [
        'titulo' => 'Painel de controle',
        'nome' => isset($conta->nome) ? $conta->nome : 'Nenhum',
        'nick' => $conta->login,
        'email' => isset($conta->email) ? $conta->email : 'Nenhum',
        'chars' => $chars,
        'erro_trocar_senha' => $action == self::ACTION_FALHA_TROCAR_SENHA,
        'sucesso_trocar_senha' => $action == self::ACTION_SUCESSO_TROCAR_SENHA
      ];

      //Mostra o painel de controle, caso positivo
      View::getInstance()->mostrar('painel_controle', $dados);
    } else {
      header("Location: index.php?r=home");
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
        $acc->trocarSenha($senhaAtual, $senhaNova);

        //Se ocorrer a troca de senha...
        //Redireciona para o painel, mostrando a mensagem de sucesso
        header("Location: index.php?r=painel&a=".self::ACTION_SUCESSO_TROCAR_SENHA);
        return true;
      } else {
        throw new \Exception('Você não possui permissão para realizar a troca da senha no momento');
      }
    } catch (\Exception $e){
      header("Location: index.php?r=painel&a=".self::ACTION_FALHA_TROCAR_SENHA);
      return false;
    }
  }
}
