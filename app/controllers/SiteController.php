<?php
/*
| Controller responsável por abrir as principais views do site
| Home, Cadastro, Informações, Downloads, Doações e Regras
*/
namespace app\controllers;
use Config;
use libs\View;
use libs\Auth;
use \app\models\Char;

class SiteController{
  const ACTION_ERRO_LOGIN = 'erro_login';
  const ACTION_ERRO_CADASTRO = 'erro_cadastro';

  //Exibe a página Home
  public function home(){
    /*
    | A variável 'a' é setada quando o usuário entra com a senha
    | incorreta ao tentar se logar
    */
    $action = (isset($_GET['a'])) ? $_GET['a'] : null;

    $dados = [
      'titulo' => 'Home',
      'aba' => 'home',
      'erro_login' => $action == self::ACTION_ERRO_LOGIN
    ];

    View::getInstance()->mostrar('home', $dados);
  }

  //Exibe a página Cadastro
  public function cadastro(){
  $_SESSION['erros_login']++;
    /*
    | A variável 'a' é setada quando ocrre algum erro criar a conta
    */
    $action = (isset($_GET['a'])) ? $_GET['a'] : null;
    $dados = [
      'titulo' => 'Cadastro',
      'aba' => 'cadastro',
      'erro_cadastro' => $action == self::ACTION_ERRO_CADASTRO
    ];

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

  //Exibe a página Regras
  public function regras(){
    $dados = [
      'titulo' => 'Regras'
    ];

    View::getInstance()->mostrar('regras', $dados);
  }

  //Exibe a página TopPVP
  public function topPvp(){
    $toppvp = Char::getTopPvp();

    $dados = [
      'titulo' => 'Top PVP',
      'chars' => $toppvp,
      'tipo' => 'PVPs'
    ];

    View::getInstance()->mostrar('toppvppk', $dados);
  }
  //Exibe a página TopPVP
  public function topPk(){
    $topPk = Char::getTopPk();

    $dados = [
      'titulo' => 'Top PK',
      'chars' => $topPk,
      'tipo' => 'PKs'
    ];

    View::getInstance()->mostrar('toppvppk', $dados);
  }

  //Exibe a página Heroes
  public function heroes(){
    $heroes = Char::getHeroes();

    $dados = [
      'titulo' => 'Heroes',
      'heroes' => $heroes
    ];

    View::getInstance()->mostrar('heroes', $dados);
  }
}
