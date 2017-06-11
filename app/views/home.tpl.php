<div class="row">
  <div class="col-xs-12">
    <!-- Carousel -->
    <article class="col-xs-12 col-sm-8">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
          <li data-target="#carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="../../assets/imgs/home_carousel/img_01.jpg" alt="img">
            <div class="carousel-caption">
              <h1>Título</h1>
              <p>Texto texto texto texto texto</p>
            </div>
          </div>
          <div class="item">
            <img src="../../assets/imgs/home_carousel/img_02.jpg" alt="img">
            <div class="carousel-caption">
              <h1>Titulo</h1>
              <p>Texto texto texto texto texto</p>
            </div>
          </div>
          <div class="item">
            <img src="../../assets/imgs/home_carousel/img_03.jpg" alt="img">
            <div class="carousel-caption">
              <h1>Titulo</h1>
              <p>Texto texto texto texto texto</p>
            </div>
          </div>
        </div>
      </div>
  </article>
    <!-- /.Carousel -->

    <!-- Redes sociais -->
    <article class="col-xs-12 col-sm-4">
      <div class="page-header">
        <h3 class="texto-cor-principal">Encontre-nos nas redes sociais</h3>
      </div>
      <p><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
          <a href="#">facebook.com/l2Site</a>
      </p>
      <p><i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
        <a href="#">@l2Site</a>
      </p>
    </article>
    <!-- /.Redes sociais -->

    <!-- Login no Painel  -->
    <article class="col-xs-12 col-md-4">
      <div class="page-header">
        <h3 class="texto-cor-principal">Painel de controle</h3>
      </div>

      <?php if(!libs\Auth::isAutenticado()) {?>
      <form action="/index.php?r=account&a=login" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="Login">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Senha">
        </div>
        <?php if($dados['erro_login'] == true) {?>
          <span class="text-danger">* Falha: <?=$dados['msg_erro']?></span>
        <?php } ?>
        <input class="btn btn-default pull-right"type="submit" name="btnSubmit" value="Login">
      </form>
      <?php } else {?>
        <a class="btn btn-primario btn-lg text-center" href="/index.php?r=painel">Acessar</a>
        <a class="btn btn-primario btn-lg text-center" href="/index.php?r=account&a=logout">Sair</a>
      <?php } ?>
    </article>
    <!-- /.Login no Painel -->

  </div> <!-- Col -->
</div> <!-- Row -->

<div class="row">
  <!-- Bem vindo -->
  <article class="col-xs-12 col-sm-6">
    <div class="page-header">
      <h2 class="texto-cor-principal">Junte-se a nós</h2>
    </div>

    <p>&nbspQuisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.</p>
  </article>
  <!-- /.Bem vindo -->

  <!-- Rates -->
  <article class="col-xs-12 col-sm-6">
    <div class="row">
      <div class="page-header">
        <h2 class="texto-cor-principal">Server Rates</h2>
      </div>
        <div class="col-xs-6 text-left texto-primario">
          <p>XP - SP</p>
          <p>Adena</p>
          <p>Enchant</p>
          <p>Buffs</p>
        </div>
        <div class="col-xs-6 text-right texto-cor-principal texto-primario">
          <p>100x</p>
          <p>1000x</p>
          <p>+3 / +12</p>
          <p>3 Horas</p>
        </div>
    </div>
    <div class="row">
      <div class="text-center">
        <a class="btn btn-primario btn-lg" href="/index.php?r=info">
          Saiba mais
        </a>
      </div>
    </div>

  </article>
  <!-- /.Rates -->
</div>
