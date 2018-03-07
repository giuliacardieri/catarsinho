<div class="modal-content">
  <div class="row">
    <div class="col s12">
      <h4>Deletar projeto</h4> 
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6"> 
      <img class="small-img responsive-img" src="<?php echo asset_url('imgs/'. $project['photo']); ?>" alt="imagem do projeto <?php echo $project['title']; ?>"/>
    </div>
    <div class="col s12 m6"> 
      <p>Deseja mesmo deletar o projeto <?php echo $project['title']; ?>?</p>
    </div>
  </div>
</div>
<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
  <a href="<?php echo site_url('home/delete_project/' . $project['id']); ?>" class="modal-action modal-close waves-effect waves-green btn btn--delete-project">Deletar</a>
</div>