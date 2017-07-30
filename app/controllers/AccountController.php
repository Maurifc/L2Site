<?php
namespace app\controllers;
use app\models\Account;
use libs\View;
use libs\Funcoes;
use libs\Auth;
use libs\Exceptions\LoginIncorretoException;
use libs\Exceptions\LoginBloqueadoException;
use \Exception;

/**
* Controller para gerenciamento de Accounts do BD L2j
* Cria, ativa, troca senha, carrega e recupera Accounts da base de dados
*/
class AccountController
{
  //Cria conta
  public function salvarConta(){
    sleep(2);

    try{
      //Cria um objeto conta e seta os atributos
      $conta = new Account();
      $conta->nome = $_POST['nomeCompleto'] ;
      $conta->login = $_POST['login'] ;
      $conta->email = $_POST['email'];
      $conta->password = $_POST['senha'];

      //Salva a conta no banco de dados
      $conta->salvar();

      //Mostra view com a mensagem de sucesso
      $dados = [
        'titulo' => 'Cadastro efetuado com sucesso',
        'aba' => 'cadastro',
        'nome' => $conta->nome
      ];

      View::getInstance()->mostrar('cadastro_sucesso', $dados);
    } catch (Exception $e){
      //Mostra mensagem de falha
      header("Location: index.php?r=cadastro&a=".SiteController::ACTION_ERRO_CADASTRO);
    }

  }

  //Loga uma conta para acesso ao painel de controle
  public function login(){
    //Prevenindo ataques de bruteforce
    sleep(2);

    try{
      //Se não está autenticado, tenta fazer a autenticação
      if(!Auth::isAutenticado()){
        $usuario = Funcoes::tString($_POST['login']);
        $senha = Funcoes::tString($_POST['password']);

        //Tenta logar o usuário se as credenciais são válidas
        Auth::login($usuario, $senha);
      }

      //Se está autenticado, redireciona para o painel
      header('Location: index.php?r=painel');
      return true;

    //Verifica se ocorreu algum erro no login...
    } catch (LoginIncorretoException $e){
      header('Location: index.php?r=home&a='.SiteController::ACTION_ERRO_LOGIN_INCORRETO);
      return false;
    } catch (LoginBloqueadoException $e){
      header('Location: index.php?r=home&a='.SiteController::ACTION_ERRO_LOGIN_BLOQUEADO);
      return false;
    } catch (Exception $e){
      header('Location: index.php?r=home&a='.SiteController::ACTION_ERRO_LOGIN_GENERICO);
      return false;
    }

  }

  //Faz logout do usuário do painel de controle
  public function logout(){
    Auth::logout();

    //Carrega a página inicial do site
    $site = new SiteController();
    header('Location: index.php?r=home');

    return true;
  }
}
