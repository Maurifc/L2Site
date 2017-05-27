<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$dados['titulo']?> | <?=Config::get('titulo_site') ?></title>
  <link rel="icon" type="image/png" href="../../assets/imgs/favicon.ico" />
  <!-- CSS -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Taviraj:400,700" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
  <link href="../../assets/css/main.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <header>
    <!-- Logotipo -->
    <div class="row">
        <img src="../../assets/imgs/logo.png" alt="logotipo" class="img-responsive logo block-center-align">
    </div>
    <!-- /.Logtipo -->

    <!-- Navbar -->    
    <nav class="navbar navbar-inverse preto-transparente">
      <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                      data-target="#nav1" aria-expanded="false">

          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand visible-xs" href="#"><?=$dados['titulo']?></span>
      </div>

      <div class="collapse navbar-collapse" id="nav1">
        <ul class="nav navbar-nav">
          <li <?php if(isset($dados['aba']) && $dados['aba'] === 'home') echo 'class="active"' ?>>
                  <a href="/index.php?r=home">Home</a></li>
          <li <?php if(isset($dados['aba']) && $dados['aba'] === 'cadastro') echo 'class="active"' ?>>
            <a href="/index.php?r=cadastro">Cadastro</a></li>
          <li <?php if(isset($dados['aba']) && $dados['aba'] === 'info') echo 'class="active"' ?>>
            <a href="/index.php?r=info">Informações</a></li>
          <li <?php if(isset($dados['aba']) && $dados['aba'] === 'downloads') echo 'class="active"' ?>>
            <a href="/index.php?r=downloads">Downloads</a></li>
          <li <?php if(isset($dados['aba']) && $dados['aba'] === 'doacoes') echo 'class="active"' ?>>
            <a href="/index.php?r=doacoes">Doações</a></li>
          <li class="hidden-sm"><a href="#">Fórum</a></li>
        </ul>
      </div>
      </div>
    </nav>
    <!-- /.Navbar -->
    </header>

    <!-- Conteúdo -->
    <section>
    <div class="panel panel-default preto-transparente">
      <div class="panel-body">
        <?php include($caminhoViewInterna) ?>
      </div>
    </div>
    </section>
    <!-- /.Conteúdo -->

    <div class="footer">
     <div id="row-footer" class="row">
       <div class="col-xs-12 col-sm-6 texto-footer">
         <p>Powered by Bootstrap, MySQL and PHP</p>
       </div>
       <div class="col-xs-12 col-sm-6 texto-footer text-right">
         <p>Copyright L2Site - 2017</p>
       </div>
     </div>
     </div>

  </div> <!-- /.Container -->

  <!-- JavaScript -->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/main.js"></script>
</body>
</html>
