<?php
namespace app\controllers;
use Config;
use libs\View;
use libs\Auth;

class SiteController{

  //Exibe a página Home
  public function home(){
    /*
    | A variável 'a' é setada quando o usuário entra com a senha
    | incorreta ao tentar se logar
    */
    $erro_login = (isset($_GET['a'])) ? true : false;

    $dados = [
      'titulo' => Config::get('titulo_site'),
      'aba' => 'home',
      'erro_login' => $erro_login
    ];

    View::getInstance()->mostrar('home', $dados);
  }

  //Exibe a página Cadastro
  public function cadastro(){
    /*
    | A variável 'a' é setada quando ocrre algum erro criar a conta
    */
    $erro = (isset($_GET['a'])) ? true : false;
    $dados = [
      'titulo' => 'Cadastre-se',
      'aba' => 'cadastro',
      'erro' => $erro
    ];
    var_dump($erro);
    View::getInstance()->mostrar('form_cadastro', $dados);
  }

  //Exibe a página Informações
  public function info(){
    $dados = [
      'titulo' => 'Informações',
      'aba' => 'info'
    ];

    View::getInstance()->mostrar('info', $dados);
  }
  //Exibe a página Downloads
  public function downloads(){
    $dados = [
      'titulo' => 'Downloads',
      'aba' => 'downloads'
    ];
    View::getInstance()->mostrar('downloads', $dados);
  }

  //Exibe a página Doações
  public function doacoes(){
    $dados = [
      'titulo' => 'Doações',
      'aba' => 'doacoes'
    ];

    View::getInstance()->mostrar('doacoes', $dados);
  }
}
