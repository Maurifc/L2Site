<?php
//Imports
require_once('app/controllers/Site.php');

$rota = isset($_GET['r']) ? $_GET['r'] : null;
$action = isset($_GET['a']) ? $_GET['a'] : null;

/*
| Instancia um controller Site, responsável por
| carregas as páginas principais do site
*/
$site = new Site();
switch ($rota) {
  case 'cadastro':
    $site->cadastro();
    break;
  case 'info':
    $site->info();
    break;
  case 'downloads':
    $site->downloads();
    break;
  case 'doacoes':
    $site->doacoes();
    break;

  default:
    $site->home(); //Exibe a home se nenhum rota for informada
    break;
}
