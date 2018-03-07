<div class="row">
  <div class="input-field col s12">
    <img class="small-img responsive-img" src="<?php echo asset_url('imgs/' . $project['photo']); ?>" alt="imagem do projeto <?php echo $project['title']?>" />
    <input id="photo_edit" name="photo" type="file" class="validate" value="<?php echo $project['photo']?>" required>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <input id="title_edit" name="title" type="text" class="validate" data-length="100" maxlength="100" value="<?php echo $project['title']?>" required>
    <label for="title">Título</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <textarea id="description_edit" name="description" type="text" class="materialize-textarea validate" data-length="300" required><?php echo $project['description']?></textarea>
    <label for="description">Descrição</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <input id="value_edit" name="value" type="number" class="validate" value="<?php echo $project['value']?>" max="500" placeholder="R$" required>
    <label for="value">Valor em reais</label>
  </div>
</div>
<input name="id" type="hidden" value="<?php echo $project['id']; ?>">