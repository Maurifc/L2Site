<?php
require_once('app/models/Account.php');
require_once('libs/view.class.php');
require_once('libs/funcoes.php');
require_once('libs/Auth.class.php');

/**
* Controller para gerenciamento de Accounts do BD L2j
* Cria, ativa, troca senha, carrega e recupera Accounts da base de dados
*/
class AccountController
{

  //Valida o form

  //Cria conta
  public function salvarConta(){
    try{
      //validar os campos

      //Cria um objeto conta e seta os atributos
      $conta = new Account();
      $conta->nome = $_POST['nomeCompleto'] ;
      $conta->login = $_POST['login'] ;
      $conta->email = $_POST['email'];
      $conta->password = $_POST['senha'];

      //Salva a conta no banco de dados
      $conta->salvar();

      //Mostra mensagem de sucesso
      $dados = [
        'titulo' => 'Cadastro efetuado com sucesso',
        'aba' => 'cadastro',
        'nome' => $conta->nome
      ];

      View::getInstance()->mostrar('cadastro_sucesso', $dados);
    } catch (Exception $e){
      //Mostra mensagem de falha
      $dados = [
        'titulo' => 'Falha no cadastro',
        'aba' => 'cadastro',
      ];

      View::getInstance()->mostrar('cadastro_falha', $dados);
    }

  }

  //Loga uma conta para acesso ao painel de controle
  public function login(){
    try{
      //Se não está autenticado, tenta fazer a autenticação
      if(!Auth::isAutenticado()){
        $usuario = tString($_POST['login']);
        $senha = tString($_POST['password']);

        //Verifica se as credenciais são válidas
        if(!Auth::login($usuario, $senha)){
          //Mostra o erro de credenciais inválidas em AJAX
          return false;
        }
      }

      //Redireciona para o painel
      header('Location: index.php?r=painel');
      return true;

    } catch (Exception $e){
      //Mostra erro de logon AJAX
      return false;
    }

  }

  //Faz logout do usuário do painel de controle
  public function logout(){
    Auth::logout();

    //Carrega a página inicial do site
    $site = new SiteController();
    header('Location: /index.php?r=home');

    return true;
  }

  //Troca senha

  //Loga uma conta

  //Recuperação de uma conta
}
