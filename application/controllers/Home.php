<?php
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('info_model');
    }

    public function index()
    {
        $logged = $this->session->userdata("logged");

        if ($logged == 1){
            $header =  $this->info_model->get_header_info($this->session->userdata['user_id']);
            $data['fname'] = $this->info_model->get_element('fname', array('id' => $this->session->userdata['user_id']),'user')['fname'];
            $data['user_id'] = $this->session->userdata['user_id'];
        } else 
            $data['user_id'] = NULL;

        $data['project'] = $this->info_model->get_projects(); 
        $data['logged'] = $logged;
        $data['user_tab'] = false;
        $data['title'] = 'Home';
        $data['active'] = 'home'; 

        $this->load->view('templates/head', $data);
        $this->load->view('templates/modal_add', $data);
        $this->load->view('templates/modal_login', $data);
        $this->load->view('templates/modal_signup', $data);
        $this->load->view('home');
        $this->load->view('templates/project_content', $data);
        $this->load->view('templates/footer');
    }    
    
    /* signup, login and logout */
    public function signup()
    {   
        $data = array(
            'fname' => $this->input->post('fname'), 
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password'))
        );
        
        $email = $this->login_model->validate_email($data);
        
        if ($email) { 
            $query = $this->login_model->new_user($data);
            $data = array(
                'email' => $this->input->post('email'),
                'user_id' => $this->info_model->get_element('id', array('email' => $this->input->post('email')), 'user')['id'],
                'logged' => true
            );
            
            $this->session->set_userdata($data);
            $this->get_login_content(); 
        }  
    } 
    
    public function login()
    {   
        $data = array(
            'email' => $this->input->post('email'), 
            'password' => sha1($this->input->post('password'))
        );
        $valid = $this->login_model->validate_login($data);
        
        if ($valid) { 
            $data = array(
                'email' => $this->input->post('email'),
                'user_id' => $this->info_model->get_element('id', array('email' => $this->input->post('email')), 'user')['id'],
                'logged' => true
            );
            
            $this->session->set_userdata($data);
        }
    }
    
    public function logout()
    {   
        $this->session->sess_destroy();      

        $data = array(
            'email' => $this->input->post('email'),
            'user_id' => $this->info_model->get_element('id', array('email' => $this->input->post('email')), 'user')['id'],
            'logged' => false
        );
        $this->session->set_userdata($data);
        $data['logged'] = $this->session->userdata("logged");
        return $this->load->view('templates/login_content', $data); 
    }

    /* adding projects */
    public function insert_project()
    {
        $config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/imgs/",
                  'upload_url'      => base_url()."assets/imgs/",
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'overwrite'       => TRUE,
                  'max_size'        => "1500KB",
                  'encrypt_name'    => TRUE
            );

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo'))
        {
            // TODO: error handling
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
        }
        $project = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'value' => $this->input->post('value'),
            'photo' => $file_name,
            'user_id' => $this->session->userdata['user_id'],
            'time_added' => date("Y-m-d H:i:s")
        );

        $id = $this->info_model->insert_project($project);
    }

    /* updating projects */
    public function update_project()
    {
        $config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/imgs/",
                  'upload_url'      => base_url()."assets/imgs/",
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'overwrite'       => TRUE,
                  'max_size'        => "1500KB",
                  'encrypt_name'    => TRUE
            );

        $this->load->library('upload', $config);
        $old_file = $this->info_model->get_element('photo', 
            array('id' => $this->input->post('id')),
            'project')['photo'];

        if (!$this->upload->do_upload('photo')) {
            $file_name = $old_file;
        } else {
            unlink($config['upload_path'] . $old_file);
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
        }    

        $project = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'value' => $this->input->post('value'),
            'photo' => $file_name,
            'user_id' => $this->session->userdata['user_id'],
            'id' => $this->input->post('id'),
        );

        $id = $this->info_model->update_project($project);
    }

    /* deleting projects */
    public function delete_project($id)
    {
        $this->info_model->delete_project($id);
    }

    /* loading functions */

    public function get_login_content()
    {
        $logged = $this->session->userdata("logged");
        if ($logged == 1){
            $header =  $this->info_model->get_header_info($this->session->userdata['user_id']);
            $data['fname'] = $this->info_model->get_element('fname', array('id' => $this->session->userdata['user_id']),'user')['fname'];
            //$data['photo'] = $header['photo'];
        }

        $data['logged'] = $logged;
        return $this->load->view('templates/login_content', $data);
    }

    public function get_all_projects()
    {
        if ($this->session->userdata("logged") == 1){
            $data['user_id'] =  $this->session->userdata['user_id'];
        } else {
            $data['user_id'] = NULL;
        }
        $data['logged'] = $this->session->userdata("logged");
        $data['user_tab'] = false;
        $data['project'] = $this->info_model->get_projects();
        return $this->load->view('templates/project_content', $data);
    }

    public function get_user_projects()
    {
        $data['logged'] = $this->session->userdata("logged");
        $data['user_tab'] = true;
        $data['project'] = $this->info_model->get_user_projects($this->session->userdata['user_id']);
        return $this->load->view('templates/project_content', $data);
    }

    public function get_tabs_content()
    {
        $data['logged'] = $this->session->userdata("logged");
        return $this->load->view('templates/tabs_content', $data);
    }

    public function get_edit_modal($project_id)
    {
        $data['project'] = $this->info_model->get_project($project_id);
        return $this->load->view('templates/modal_edit', $data);
    }

    public function get_delete_modal($project_id)
    {
        $data['project'] = $this->info_model->get_project($project_id);
        return $this->load->view('templates/modal_delete', $data);
    }

    public function get_visualize_modal($project_id)
    {   
        $data['project'] = $this->info_model->get_project($project_id);
        return $this->load->view('templates/modal_visualize', $data);
    }
}
