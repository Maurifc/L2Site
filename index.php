<?php
//Imports
require_once('app/controllers/Site.php');

$rota = isset($_GET['r']) ? $_GET['r'] : null;
$action = isset($_GET['a']) ? $_GET['a'] : null;

switch ($rota) {
  case 'cadastro':
    Site::cadastro();
    break;
  case 'info':
    Site::info();
    break;
  case 'downloads':
    Site::downloads();
    break;
  case 'doacoes':
    Site::doacoes();
    break;

  default:
    Site::home(); //Exibe a home se nenhum rota for informada
    break;
}
