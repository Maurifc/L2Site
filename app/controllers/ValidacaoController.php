<?php
namespace app\controllers;
use app\models\Account;
use Config;
use libs\Funcoes;

/**
 * Realiza a validação de campos de formulário e retorna a resposta
 * Através de AJAX
 */
class ValidacaoController
{

  /*
  |Recebe um campo por parâmetro e retorna true caso seja válido.
  */
  public function testar($campo, $valor){
    header("Content-Type: application/json; charset=utf-8");

    //Tratamento de strings
    $campo = Funcoes::tString($campo);
    $valor = Funcoes::tString($valor);
    //error_log($valor, 0);
    //Verificamos qual campo foi passado por parâmetro
    switch ($campo) {
      case 'login':
        $this->testarLogin($valor);
        break;

      default:
        return false;
        break;
    }
  }

  /*
  | Verifica se o login (nome da conta) informado já existe no banco de dados.
  | O login não pode ser duplicado.
  */
  public function testarLogin($login){
    if(Account::get($login)){
    //if(false){
      $resposta = array(
        "Login informado já existe!",
        "erro");

    } else {
      $resposta = array(
        "",
        "ok");
    }

  echo json_encode($resposta);
  }
}
