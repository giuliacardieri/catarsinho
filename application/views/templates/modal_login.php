  <div id="modalLogin" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <h4>Login - Catarsinho</h4> 
        </div>
      </div>
      <div class="row">
        <form class="col s12 login-form" data-href="<?php echo site_url('home/login'); ?>" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="email_login" name="email" type="email" class="validate" required>
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password_login" name="password" type="password" class="validate" required>
              <label for="password">Senha</label>
            </div>
          </div>
        <div class="row row--no-margin-bottom">
          <div class="col s12">
            <button type="submit" data-href="<?php echo site_url('home/get_login_content'); ?>" class="right modal-action modal-close waves-effect waves-green btn btn--login">Entrar</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>