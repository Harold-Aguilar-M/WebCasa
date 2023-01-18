<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function login($username, $password){

        $this->db->where('nameUser', $username);
        $this->db->where('passwordUser', $password);
        $query = $this->db->get('User');

        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }

}

?>