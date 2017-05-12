<?php

/**
 * Carrega as views para exibição
 */
include('template.class.php');

class View
{
  private static $instance;
  const LAYOUT_PADRAO = 'layouts/app.tpl.php';
  const PASTA_VIEWS = 'app/views/';

  //Renderiza a view passada por parametro
  public function mostrar($viewInterna, $arrayVariaveis = null){
    //Cria a view, já atribuindo o layout padrão
    $template = new Template(self::PASTA_VIEWS.self::LAYOUT_PADRAO,
                              self::PASTA_VIEWS.$viewInterna);

    if($arrayVariaveis !== null){
      foreach ($arrayVariaveis as $key => $value) {
        $template->setAllValues($arrayVariaveis);
      }
    }

    echo $template->output();
  }

  public static function getInstance(){
    if($instance === null){
      $instance = new View();
    }

    return $instance;
  }
}
