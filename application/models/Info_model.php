<?php
class Info_model extends CI_Model {

    // gets a generic element from a table in the database
    // $attr : the attributes that will be selected on the query
    // $array : the array specifying the query
    // $table : the table of the query
    public function get_element($attr, $array, $table)
    {
        $this->db->select($attr);
        $this->db->where($array);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    // gets the necessary information to create the header of each page
    public function get_header_info($id)
    {
        $this->db->select('fname, id');
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->result_array();
    }

    // gets the first and last name of the owner from an specific project
    // $id : the id of the project
    public function get_owner($id)
    {
        if ($id == $this->session->userdata['user_id'])
            return NULL;
        $this->db->select('fname, lname');
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    // gets all projects
    public function get_projects()
    {
        $this->db->from('project');
        $this->db->order_by('time_added', 'DESC');
        $query = $this->db->get();
        return $this->add_attr($query->result_array());
    }

    // gets projects from a specific user
    // $id : user id of the user owner of the projects
    public function get_user_projects($id)
    {
        $this->db->order_by('time_added', 'DESC');
        $query = $this->db->get_where('project', array('user_id' => $id));
        return $this->add_attr($query->result_array());
    }

    // gets all the information from a project
    // $id : the id of project
    public function get_project($id)
    {
        $current_time = date("Y-m-d H:i:s");
        $query = $this->db->get_where('project', array('id' => $id));
        $project = $query->row_array();
        $project['owner_fname'] = $this->get_element('fname', array('id' => $project['user_id']), 'user')['fname'];
        $project['owner_lname'] = $this->get_element('lname', array('id' => $project['user_id']), 'user')['lname'];
        $project['remaining_time'] = round(48 - (strtotime($current_time) - strtotime($project['time_added']))/3600);
        return $project;
    }

    // inserts a new project into the database
    // $project : the information to be included in the database
    public function insert_project($project)
    {
        $this->db->insert('project', $project);
        return $this->db->insert_id();
    }

    // updates the information of a project
    // $project : the information to be updated in the database
    public function update_project($project)
    {
        $this->db->where(array('id' => $project['id']));
        $this->db->update('project', $project);
    }

    // deletes a project from the database
    // $id : the id of the project that will be deleted
    public function delete_project($id)
    {
        $path = dirname($_SERVER["SCRIPT_FILENAME"])."/assets/imgs/";
        $file = $this->get_element('photo', array(
            'id' => $id
        ),'project')['photo'];
        unlink($path . $file);
        $this->db->delete('project', array('id' => $id));
    }

    // adds a owner first and last name, and remaining hours to a project
    // $projects : an array with all projects
    public function add_attr($projects)
    {            
        $current_time = date("Y-m-d H:i:s");
        foreach ($projects as $key => $project) {
            $projects[$key]['owner_fname'] = $this->get_element('fname', array('id' => $project['user_id']), 'user')['fname'];
            $projects[$key]['owner_lname'] = $this->get_element('lname', array('id' => $project['user_id']), 'user')['lname'];
            $projects[$key]['remaining_time'] = round(48 - (strtotime($current_time) - strtotime($project['time_added']))/3600);
        }
        return $projects;
    }
}