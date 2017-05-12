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
    <form class="form form-default" action="#" method="post">
      <div class="form-group">
        <input class="form-control input-lg" type="text" name="txtNomeCompleto" placeholder="nome completo" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="text" name="txtLogin" placeholder="login" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg" type="email" name="email" placeholder="e-mail" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg"type="password" name="password" min="6" placeholder="senha" required>
      </div>
      <div class="form-group">
        <input class="form-control input-lg"type="password" name="repPassword" min="6" placeholder="repetir senha" required>
      </div>

      <p><input type="checkbox" name="chbAceito" required>
        <a href="#">Aceito o contrato de licença</a></p>

        <input class="btn btn-default btn-lg pull-right" type="submit" name="btnSubmit" value="Cadastrar">
      </form>
    </div>
  </div> <!-- /.Row -->
  <!-- /.Form Cadastro -->
