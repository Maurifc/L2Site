<?php

/**
 * Carrega as views para exibição
 */
include('template.class.php');

class View
{
  const LAYOUT_PADRAO = 'layouts/app.tpl.php';
  const PASTA_VIEWS = 'app/views/';

  //Renderiza a view passada por parametro
  public function mostrar($viewInterna, $arrayVariaveis = null){
    //Cria a view, já atribuindo o layout padrão
    $template = new Template(self::PASTA_VIEWS.self::LAYOUT_PADRAO,
                              self::PASTA_VIEWS.$viewInterna);

    //Informa ao template, qual view será a view do conteúdo
    //$template->set('conteudo', self::PASTA_VIEWS.$viewInterna.'.tpl.php');

    if($arrayVariaveis !== null){
      foreach ($arrayVariaveis as $key => $value) {
        $template->setAllValues($arrayVariaveis);
      }
    }

    echo $template->output();
  }
}
