<?php
require_once('libs/view.class.php');
require_once('libs/mysqliconnector.class.php');
require_once('config.php');

class Site{

  //Exibe a página Home
  public function home(){
    $dados = [
      'titulo' => Config::get('titulo_site'),
      'aba' => 'home'
    ];

    View::getInstance()->mostrar('home', $dados);
  }

  //Exibe a página Cadastro
  public function cadastro(){
    $dados = [
      'titulo' => 'Cadastre-se',
      'aba' => 'cadastro'
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
}
