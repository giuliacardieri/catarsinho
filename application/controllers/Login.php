<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }
    
    
}