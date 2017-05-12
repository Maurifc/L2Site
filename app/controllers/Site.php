<?php
require_once('libs/view.class.php');

class Site{

  //Exibe a página Home
  public static function home(){
    View::getInstance()->mostrar('home', $dados);
  }

  //Exibe a página Cadastro
  public static function cadastro(){
    View::getInstance()->mostrar('form_cadastro');
  }
  
  //Exibe a página Informações
  public static function info(){
    View::getInstance()->mostrar('info');
  }
  //Exibe a página Downloads
  public static function downloads(){
    View::getInstance()->mostrar('downloads');
  }
  //Exibe a página Doações
  public static function doacoes(){
    View::getInstance()->mostrar('doacoes');
  }
}
