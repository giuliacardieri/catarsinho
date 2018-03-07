<?php if ($logged): ?>
  <ul class="blue darken-3 tabs tabs-fixed-width">
    <li class="tab col s3"><a class="active tab--all_projects" href="<?php echo site_url('home/get_all_projects'); ?>">Todos os projetos</a></li>
    <li class="white-text tab col s3"><a class="tab--user_projects" href="<?php echo site_url('home/get_user_projects'); ?>">Meus projetos</a></li>
  </ul>
<?php endif; ?>