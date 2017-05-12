<?php

/**
 * Carrega as views para exibição
 */
class View
{
  private static $instance;
  const PASTA_VIEWS = 'app/views/';

  //Renderiza a view passada por parametro
  public function mostrar($viewInterna, $dados){
    $caminhoLayoutPadrao = self::PASTA_VIEWS.Config::get('layout_padrao');
    $caminhoViewInterna = self::PASTA_VIEWS.$viewInterna.'.tpl.php';

    include($caminhoLayoutPadrao);
  }

  public static function getInstance(){
    if($instance === null){
      $instance = new View();
    }

    return $instance;
  }
}
