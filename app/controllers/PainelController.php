<?php

require_once('libs/view.class.php');
/**
 * Controla as funções do painel de controle
 */
class PainelController
{

  public function exibir(){
    if(Auth::isAutenticado()){
      //Exibe o painel depois que o usuário está autenticado
      $dados = [
        'titulo' => 'Painel de controle'
      ];

      //Mostra o painel de controle, caso positivo
      View::getInstance()->mostrar('painel_controle', $dados);
    } else {
      header("Location: /index.php?r=home");
    }
  }
}
