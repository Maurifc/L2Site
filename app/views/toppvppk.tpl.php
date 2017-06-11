<div class="row">
  <div class="col-xs-10 col-xs-offset-1">
    <div class="page-header">
        <h2 class="texto-cor-principal text-center"><?=$dados['titulo']?></h2>
    </div>
    <table id="tabela-top" class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th><?=$dados['tipo']?></th>
          <th>Nick</th>
          <th>Classe</th>
          <th>Clan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach($dados['chars'] as $key=>$char) {?>
          <tr>
            <!-- Posição do player no ranking -->
            <td><?=$key+1 ?></td>
            <!-- Quantidade de PVPs ou PKs -->
              <?php if($dados['tipo'] == 'PVPs'){ ?>
                <td><?=$char->pvpkills?></td>
              <?php } else { ?>
                <td><?=$char->pkkills?></td>
              <?php } ?>
            <!-- Nome do char -->
            <td><?=$char->char_name ?></td>
            <!-- Classe -->
            <td><?=$char->classe ?></td>
            <!-- Clan (se possuir) -->
            <?php if($char->clan != '') {?>
              <td><?=$char->clan ?></td>
            <?php } else {?>
              <td>-Nenhum-</td>
            <?php } ?>
          </tr>
          <?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
</div> <!-- /.Row -->
