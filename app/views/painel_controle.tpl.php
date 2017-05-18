<!-- Conteúdo -->
<div class="row">
  <div class="col-xs-12">
    <div class="page-header">
      <h2>Painel de controle <a href="/index.php?r=account&a=logout"><small class="pull-right">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></small></a></h2>
    </div>
    <p>Olá <?=$_SESSION['usuario'] ?>, seja bem vindo ao painel de controle do nosso servidor!</p>

    <div class="col-xs-12 col-sm-4">
      <div class="page-header">
        <h3>Alterar Senha</h3>
      </div>
      <form action="/index.php?r=account&a=alterarSenha" method="post">
        <div class="form-group">
          <input class="form-control" type="password" name="senha" placeholder="Senha Atual">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="nova_senha" placeholder="Nova senha">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="rep_nova_senha" placeholder="Repetir nova senha">
        </div>

        <input class="btn btn-default pull-right" type="submit" value="Trocar">
      </form>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="page-header">
        <h3>Meus chars</h3>
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nick</th>
            <th>Classe</th>
            <th>PVP</th>
            <th>PK</th>
            <th>Jail?</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Nick</td>
            <td>Moonlight Sentinel</td>
            <td>3211</td>
            <td>116</td>
            <td>Não</td>
            <td>80</td>
          </tr>
          <tr>
            <td>Nick</td>
            <td>Moonlight Sentinel</td>
            <td>3211</td>
            <td>116</td>
            <td>Não</td>
            <td>80</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.Conteúdo -->
