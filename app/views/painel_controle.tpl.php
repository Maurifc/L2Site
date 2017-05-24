<!-- Conteúdo -->
<div class="row">
  <div class="col-xs-12">
    <div class="page-header">
      <h2 class="texto-cor-principal">Painel de controle <a href="/index.php?r=account&a=logout"><small class="pull-right">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></small></a></h2>
    </div>
    <p>Olá <span class="texto-cor-principal"><?=$_SESSION['usuario'] ?></span>, seja bem vindo ao painel de controle do nosso servidor!</p>

    <div class="col-xs-12 col-sm-4">
      <div class="page-header">
        <h3 class="texto-cor-principal">Alterar Senha</h3>
      </div>
      <form action="/index.php?r=painel&a=alterarSenha" method="post">
        <div class="form-group">
          <input class="form-control" type="password" name="senhaAtual" placeholder="Senha Atual" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="senha" placeholder="Nova senha" oninput="validarSenha('painel')"  required>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="repSenha" placeholder="Repetir nova senha" oninput="validarSenha('painel')" required>
          <p id="msg-erro-rep-senha" class="text-danger"></p>
        </div>

        <input class="btn btn-default pull-right" type="submit" value="Trocar" disabled>
      </form>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="page-header">
        <h3 class="texto-cor-principal">
          Meus chars <small><?=count($dados['chars'])?>/7</small>
        </h3>
      </div>
      <?php if($dados['chars'] != false) {?>
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
            <?php foreach ($dados['chars'] as $char) { ?>
              <tr>
                <td><?=$char->char_name ?></td>
                <td><?=$char->classe ?></td>
                <td><?=$char->pvpkills ?></td>
                <td><?=$char->pkkills ?></td>
                <td>
                  <?php if($char->accesslevel == -1){
                    echo 'Sim';
                  } else {
                   echo 'Não';
                 }?>
                </td>
                <td><?=$char->level ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else {?>
        <p>Você ainda não criou nenhum personagem.</p>
        <p>Acesse nosso servidor e crie agora mesmo!</p>
      <?php } ?>
    </div>
  </div>
</div>
<!-- /.Conteúdo -->
