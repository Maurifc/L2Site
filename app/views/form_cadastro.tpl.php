<!-- Form Cadastro -->
<div class="row">
  <div class="col-xs-12">
    <div class="page-header">
      <h2 class="texto-cor-principal">Cadastro</h2>
    </div>
  </div>
</div> <!-- /.Row -->
<div class="row">
  <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
    <form class="form form-default" action="/index.php?r=account&a=salvarconta" method="post">
      <div class="form-group">
        <input class="form-control input-lg" type="text" name="nomeCompleto" placeholder="Nome completo" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="text" name="login" placeholder="Login" oninput="validar(this, $('#msg-erro-login'))" required>
        <p id="msg-erro-login" class="text-danger"></p>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="email" name="email" placeholder="E-mail" oninput="validar(this, $('#msg-erro-email'))" required>
        <p id="msg-erro-email" class="text-danger"></p>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="password" name="senha" min="6" placeholder="Senha" oninput="validarSenha('cadastro')" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="password" name="repSenha" min="6" placeholder="Repetir senha" oninput="validarSenha('cadastro')" required>
        <p id="msg-erro-rep-senha" class="text-danger"></p>
      </div>

      <div class="checkbox">
        <label>
          <input type="checkbox" required>Estou de acordo com as <a href="/index.php?r=regras" target="_blank">regras do servidor</a>
        </label>
      </div>
      <?php if($dados['erro_cadastro'] == true) { ?>
        <p class="text-danger" style="font-size: 1.3em">*Erro ao
           criar a conta. Verifique os campos digitados e tente   novamente!
        </p>
      <?php } ?>

      <!-- Loader -->
      <div class="loader">
        <div class="loading"></div>
        <span class="loading-texto">Validando o campo</span>
      </div>
      <!-- /.Loader -->

      <input class="btn btn-primario btn-lg pull-right" type="submit"
      id="submitCadastro" value="Cadastrar">

    </form>
    </div>
  </div> <!-- /.Row -->
  <!-- /.Form Cadastro -->
