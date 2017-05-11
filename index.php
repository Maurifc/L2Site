<?php
//Imports
require_once('libs/view.class.php');

$rota = isset($_GET['r']) ? $_GET['r'] : 'home';
$action = isset($_GET['a']) ? $_GET['a'] : null;

//instancia o renderizador de views
$view = new View();
switch ($rota) {
  case 'home':
    $view->mostrar('home');
    break;

  default:
    # code...
    break;
}
