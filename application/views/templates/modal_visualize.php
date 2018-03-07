<div class="modal-content">
  <div class="row">
    <div class="col s12">
      <h4><?php echo $project['title']; ?></h4> 
    </div>
  </div>
  <div class="row row--no-margin-bottom">
    <div class="col s12 m7"> 
      <img class="small-img responsive-img" src="<?php echo asset_url('imgs/'. $project['photo']); ?>" alt="imagem do projeto <?php echo $project['title']; ?>"/>
    </div>
    <div class="col s12 m5"> 
      <p><?php echo $project['description']; ?></p>
      <p class="p--little-margin-top">por <?php echo $project['owner_fname'] . ' ' . $project['owner_lname']; ?></p>
      <p>Valor a arrecadar: R$ <?php echo $project['value']; ?></p>
      <?php if ($project['remaining_time'] >= 0): ?>
        <p>Tempo restante: <?php echo $project['remaining_time']; ?> horas</p>
      <?php else: ?>
        <p>O tempo para apoiar esse projeto acabou</p>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
  <?php if ($project['remaining_time'] > 0): ?>
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Apoiar projeto</a>
  <?php endif; ?>
</div>