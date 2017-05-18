<?php
require_once('libs/DbConnector.class.php');
require_once('Model.php');

/**
* Realiza operações de banco de dados relacionado à entidade Accounts
*/
class Account extends Model
{
  public $nome;
  public $login;
  public $email;
  public $password;

  public function __construct(){
    parent::__construct();
  }

  //Salvar
  public function salvar(){
    $ins = $this->pdo->prepare("INSERT INTO accounts(login, password,
      nome, email) VALUES(:login,:password,:nome,:email)");
    $ins->bindParam(":login", $this->login);
    $ins->bindParam(":password", base64_encode(pack("H*", sha1(utf8_encode($this->password)))));
    $ins->bindParam(":nome", $this->nome);
    $ins->bindParam(":email", $this->email);

    $obj = $ins->execute();
    return ($obj) ? $obj : false;
  }


  //Atualizar

  //Autenticar usuário
}
