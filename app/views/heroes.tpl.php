<div class="row">
  <div class="col-xs-10 col-xs-offset-1">
    <div class="page-header">
        <h2 class="texto-cor-principal text-center"><?=$dados['titulo']?></h2>
    </div>
  </div>
  <div class="col-xs-8 col-xs-offset-2">
    <table id="tabela-top" class="table table-hover">
      <thead>
        <tr>
          <th>Nick</th>
          <th>Classe</th>
          <th>PVPs</th>
          <th>PKs</th>
          <th>Clan</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($dados['heroes'] as $key=>$hero) {?>
          <tr>
            <!-- Nome do char -->
            <td><?=$hero->char_name ?></td>
            <!-- Classe -->
            <td><?=$hero->classe ?></td>
            <!-- Quantidade de PVPs e PKs -->
            <td><?=$hero->pvpkills?></td>
            <td><?=$hero->pkkills?></td>
            <!-- Clan (se possuir) -->
            <?php if($hero->clan != '') {?>
              <td><?=$hero->clan ?></td>
            <?php } else {?>
              <td>-Nenhum-</td>
            <?php } ?>
          </tr>
          <?php } ?>
      </tbody>
    </table>
    </div>
</div> <!-- /.Row -->
