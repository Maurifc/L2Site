<?php
//Debug
ini_set('display_errors', 1);

//Imports
require_once('app/controllers/SiteController.php');
require_once('app/controllers/AccountController.php');

$rota = isset($_GET['r']) ? $_GET['r'] : null;
$action = isset($_GET['a']) ? $_GET['a'] : null;

/*
| Instancia um controller Site, responsável por
| carregar as páginas principais do site
*/
$site = new SiteController();
switch ($rota) {
  //Rotas principais de navegação
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

  //Rotas para gerenciamento de contas
  case 'account':
    $acc = new AccountController();
    switch ($action) {
      case 'salvarconta':
        $acc->salvarConta();
        break;
    }
    break;

  default:
    $site->home(); //Exibe a home se nenhum rota for informada
    break;
}
