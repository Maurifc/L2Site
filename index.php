<?php
//Debug
ini_set('display_errors', 1);

//Imports
require_once('app/controllers/SiteController.php');
require_once('app/controllers/AccountController.php');
require_once('app/controllers/PainelController.php');

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

  //Rotas de Cadastro e Login
  case 'account':
    $acc = new AccountController();
    switch ($action) {
      case 'salvarconta':
        $acc->salvarConta();
        break;
      case 'login':
        $acc->login();
        break;
      case 'logout':
        $acc->logout();
        break;
    }
    break;

    //Rotas do Painel de controle
    case 'painel':
      $painel = new PainelController();
      switch ($action) {
        case 'value':
          # code...
          break;

        default:
          $painel->exibir();
          break;
      }
    break;

  default:
    $site->home(); //Exibe a home se nenhum rota for informada
    break;
}
