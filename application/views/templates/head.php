<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?> - Catarsinho</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <link type="text/css" rel="stylesheet" href="<?php echo asset_url('css/style.css'); ?>">

    <script>var base_url = "<?php echo base_url(); ?>";</script>
    <script src="<?php echo asset_url('js/jquery.js'); ?>"></script>
    <script src="<?php echo asset_url('js/jquery.form.js'); ?>"></script>
    <script src="<?php echo asset_url('js/materialize.min.js'); ?>"></script>
    <script src="<?php echo asset_url('js/script.js'); ?>"></script>
</head>

<body class="grey lighten-4">
    
  <nav>
    <div class="nav-wrapper blue darken-3">
      <a href="#!" class="brand-logo">Catarsinho</a>
      <div class="login-content">
        <?php if ($logged == false): ?>
          <div class="button-wrapper button-wrapper--login-info right">
           <a href="#modalSignup" class="modal-trigger waves-effect waves-light btn">Cadastre-se</a>
           <a href="#modalLogin" class="modal-trigger waves-effect waves-light btn">Login</a>
          </div>
        <?php else: ?>
          <ul class="button-wrapper right">
            <li class="hide-on-med-and-down">
              <p class="p--no-margin">Olá, <?php echo $fname; ?></p>
            </li>
            <li>
              <a href="<?php echo site_url('home/logout'); ?>" class="btn--logout waves-effect waves-light btn-flat">
                <span class="hide-on-small-only">Logout</span>
                <i class="material-icons show-on-small">exit_to_app</i>
              </a>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <div class="tabs-wrapper" data-href="<?php echo site_url('home/get_tabs_content'); ?>">
    <?php if ($logged): ?>
      <ul class="blue darken-3 tabs tabs-fixed-width">
        <li class="tab col s3"><a class="active tab--all_projects" href="<?php echo site_url('home/get_all_projects'); ?>">Todos os projetos</a></li>
        <li class="white-text tab col s3"><a class="tab--user_projects" href="<?php echo site_url('home/get_user_projects'); ?>">Meus projetos</a></li>
      </ul>
    <?php endif; ?>
  </div>

<div id="modalEdit" class="modal">
  <div class="modal-content">
    <div class="row">
      <div class="col s12">
        <h4>Editar projeto</h4> 
      </div>
    </div>
      <div class="row">
        <form class="col s12 edit-form" action="<?php echo site_url('home/update_project'); ?>" method="post">
          <div class="modalEdit-content">
           </div>
            <div class="row">
              <div class="col s12"> 
                <button type="submit" data-href="<?php echo site_url('home/get_user_projects'); ?>" class="right btn modal-action modal-close waves-effect waves-green btn--edit-project">Salvar</button>
              </div>
            </div>
        </form>
      </div>
  </div>
</div>

<div id="modalDelete" class="modal"></div>
<div id="modalVisualize" class="modal"></div>