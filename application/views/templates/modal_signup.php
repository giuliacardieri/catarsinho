  <div id="modalSignup" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <h4>Cadastro - Catarsinho</h4> 
        </div>
      </div>
      <div class="row">
        <form class="col s12 signup-form" data-href="<?php echo site_url('home/signup'); ?>" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="fname_signup" name="fname" type="text" class="validate" required>
              <label for="fname">Primeiro Nome</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="lname_signup" name="lname" type="text" class="validate" required>
              <label for="lname">Sobrenome</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email_signup" name="email" type="email" class="validate" required>
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password_signup" name="password" type="password" class="validate" required>
              <label for="password">Senha</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
              <button type="submit" data-href="<?php echo site_url('home/get_login_content'); ?>" class="right modal-action modal-close waves-effect waves-green btn btn--signup">Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>