<?php
namespace app\models;
use libs\Funcoes;
use libs\DbConnector;
use \PDO;

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
    $ins->bindParam(":password", Funcoes::criptografar($this->password));
    $ins->bindParam(":nome", $this->nome);
    $ins->bindParam(":email", $this->email);

    $obj = $ins->execute();
    return ($obj) ? $obj : false;
  }

  //Altera senha de uma conta
  public function trocarSenha($senhaAtualInformada, $senhaNova){
    //Verifica se a senha atual informa é válida
    if($this->verificarSenhaAtual($senhaAtualInformada)){
      $novaSenhaCriptografada = Funcoes::criptografar($senhaNova);

      $query = $this->pdo->prepare('UPDATE accounts SET password= :novaSenha WHERE login= :login');
      $query->bindParam(':novaSenha', $novaSenhaCriptografada);
      $query->bindParam(':login', $this->login);
      $query->execute();

      //Se conseguiu concluir a troca de senha...
      if($query->rowCount()){
        return true;
      } else {
        throw new \Exception();
      }

    } else {
      throw new \Exception('Senhas atual incorreta');
    }
  }

  //Carrega uma conta do banco de dados (a partir do login)
  public static function get($login){
    //Monta o novo objeto
    $account = new Account();

    //Carrega as informações para esse objeto no banco de dados
    //return $account->load($login);
    return $account->load($login);
  }

  /*
  | Verifica se a senha atual do usuário no banco de dados é de fato
  | igual a senha informada no parâmetro
  */
  public function verificarSenhaAtual($senha){
    $senhaCriptografada = Funcoes::criptografar($senha);

    return $this->password == $senhaCriptografada;
  }

  //Carrega o objeto account com as informações do banco de dados
  public function load($login){
    $query = $this->pdo->prepare("SELECT * FROM accounts WHERE login=:login");
    $query->bindParam(':login', $login);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_OBJ);
    if(!$result){
      return false;
    }

    $this->nome = $result->nome;
    $this->login = $result->login;
    $this->email = $result->email;
    $this->password = $result->password;
    return $this;
  }

  /*
  | Validações
  */
  public function emailExiste($email){
    $pdo = DbConnector::getConn();
    $query = $pdo->prepare("SELECT login FROM accounts WHERE email=:email");
    $query->bindParam(':email', $email);
    $query->execute();

    return ($query->rowCount() == 1) ? true : false;
  }
}
