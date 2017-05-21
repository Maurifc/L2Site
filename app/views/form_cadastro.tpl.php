<!-- Form Cadastro -->
<div class="row">
  <div class="col-xs-12">
    <div class="page-header">
      <h2>Cadastro</h2>
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
        <input class="form-control input-lg" type="text" name="login" placeholder="Login" onfocusout="validar(this, $('#msg-erro-login'))" required>
        <p id="msg-erro-login" class="text-danger"></p>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="email" name="email" placeholder="E-mail"  onfocusout="validar(this, $('#msg-erro-email'))" required>
        <p id="msg-erro-email" class="text-danger"></p>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="password" name="senha" min="6" placeholder="Senha" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="password" name="repSenha" min="6" placeholder="Repetir senha" required>
        <p id="msg-erro-rep-senha" class="text-danger"></p>
      </div>

      <p>
        <input type="checkbox" name="chbAceito" required>
        <a href="#">Aceito o contrato de licença</a>
      </p>

      <div class="row">
        <div class="col-xs-12">
          <div class="loader">

            <div class="loading"></div>
            <span class="loading-texto">Validando o campo</span>
          </div>

          <input class="btn btn-primario btn-lg pull-right" type="submit"
               name="btnSubmit" value="Cadastrar">
        </div>
      </div>

    </form>
    </div>
  </div> <!-- /.Row -->
  <!-- /.Form Cadastro -->
