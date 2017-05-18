<?php
require_once('app/models/Account.php');
require_once('libs/view.class.php');

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

  //Troca senha

  //Loga uma conta

  //Recuperação de uma conta
}
