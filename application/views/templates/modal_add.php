  <div id="modalAdd" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <h4>Criar novo projeto</h4> 
        </div>
      </div>
      <div class="row">
        <form class="col s12 add-form" action="<?php echo site_url('home/insert_project'); ?>" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="title_add" name="title" type="text" class="validate" data-length="100" maxlength="100" required>
              <label for="title">Título</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="description_add" name="description" class="materialize-textarea validate" data-length="300" required></textarea>
              <label for="description">Descrição</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="value_add" name="value" type="number" class="validate" max="500" placeholder="R$" required>
              <label for="value">Valor em reais</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="photo_add" name="photo" type="file" class="validate" accept="image/*" required>
              <label class="label--photo_add" for="photo">Foto</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12"> 
              <button type="submit" data-href="<?php echo site_url('home/get_user_projects'); ?>" class="right btn modal-action modal-close waves-effect waves-green btn--add">Adicionar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>