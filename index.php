<?php
//Inicia a sessão
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

//Debug
ini_set('display_errors', 1);

//Imports
require_once('autoload.php');
use app\controllers\SiteController;
use app\controllers\AccountController;
use app\controllers\PainelController;
use app\controllers\ValidacaoController;

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
        case 'alterarSenha':
          $painel->alterarSenha();
          break;

        default:
          $painel->exibir();
          break;
      }
    break;

    //Rota de validação de formulários
    case 'validacao':
      $validacao = new ValidacaoController();
      $validacao->testar($_GET['campo'], $_GET['valor']);
      break;

  default:
    $site->home(); //Exibe a home se nenhum rota for informada
    break;
}
