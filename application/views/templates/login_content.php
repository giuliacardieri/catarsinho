<?php if ($logged == false): ?>
  <div class="button-wrapper button-wrapper--login-info right">
   <a href="#modalSignup" class="modal-trigger waves-effect waves-light btn">Cadastre-se</a>
   <a href="#modalLogin" class="modal-trigger waves-effect waves-light btn">Login</a>
  </div>
<?php else: ?>
  <ul class="button-wrapper right">
    <li class="hide-on-small-only hide-on-med-and-down">
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
