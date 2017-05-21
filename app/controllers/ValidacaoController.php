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
    //Aguarda 2s para evitar flood na checkagem
    sleep(2);

    //Tratamento de strings
    $campo = Funcoes::tString($campo);
    $valor = Funcoes::tString($valor);

    //Verificamos qual campo foi passado por parâmetro
    switch ($campo) {
      case 'login':
        $this->testarLogin($valor);
        break;

      case 'email':
        $this->testarEmail($valor);
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

  /*
  | Verifica se o email informado já existe no banco de dados.
  | O email não pode ser duplicado.
  */
  public function testarEmail($email){
    if(Account::emailExiste($email)){
      $resposta = array(
        "Email informado já está em uso.",
        "erro"
      );
    } else {
      $resposta = array(
        "",
        "ok"
      );
    }

    echo json_encode($resposta);
  }
}
