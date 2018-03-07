<?php if (!empty($project)): ?>

  <?php foreach ($project as $key => $project_info): ?>

    <?php if ($key%3 == 0 && $key != 0): ?>
      </div>
    <?php endif; ?>  

    <?php if ($key == 0 || $key%3 == 0): ?>
      <div class="row">
    <?php endif; ?>

      <div class="col s12 m4">
        <div class="card hoverable" data-href="<?php echo site_url('home/get_visualize_modal/' . $project_info['id']); ?>">
         
          <div class="card-image">
            <img src="<?php echo asset_url('imgs/' . $project_info['photo']); ?>">
            <span class="card-title"><?php echo $project_info['title']; ?></span>
          </div>

          <div class="card-content">
            <?php if ($user_tab == false): ?>
                <p>
                  <i class="material-icons icons--p">account_circle</i>
                  Por <?php if ($user_id == $project_info['user_id']) echo 'Você'; else { echo $project_info['owner_fname'] . ' ' . $project_info['owner_lname']; } ?>
                </p>
            <?php endif; ?>
            <p class="truncate">
              <i class="material-icons icons--p">info</i>
              <?php echo $project_info['description']; ?>
            </p>
            <p>
              <i class="material-icons icons--p">attach_money</i>
              R$ <?php echo $project_info['value']; ?>
            </p>
              <p>
                <i class="material-icons icons--p">access_time</i>
                <?php if ($project_info['remaining_time'] >= 0): ?>
                  <?php echo $project_info['remaining_time']; ?> horas restantes
                <?php else: ?>
                  Projeto encerrado
            </p>      
            <?php endif; ?>
          </div>
          <?php if ($user_tab): ?>
            <div class="card-action">
              <a href="#" data-href="<?php echo site_url('home/get_edit_modal/' . $project_info['id']); ?>" class="blue-text text-darken-4 btn--edit">Edit</a>
              <a href="#" data-href="<?php echo site_url('home/get_delete_modal/' . $project_info['id']); ?>" class="blue-text text-darken-4 btn--delete">Delete</a>
            </div>
          <?php endif; ?>

        </div>
      </div>
      <?php if ($key == sizeof($project)): ?>
        </div>
      <?php endif; ?>  
  <?php endforeach; ?>

  <?php if ($user_tab): ?>
    <a href="#modalAdd" class="right modal-trigger btn-floating btn-large btn-floating--add waves-effect waves-light"><i class="material-icons">add</i></a>
  <?php endif; ?>

<?php else: ?>
  <div class="row">
    <div class="col s12">
      <p>Ops... Nenhum projeto foi criado.</p>
      <?php if ($user_tab == true): ?>
        <a href="#modalAdd" class="modal-trigger btn waves-effect waves-light">Criar projeto</a>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>