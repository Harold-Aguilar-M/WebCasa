<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_user($nameUser)
    {
        $this->db->select('idUser,lastNameUser');
        $this->db->where('nameUser', $nameUser);
        $this->db->from('User');

        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $data = $row->lastNameUser;
        }

        return $data;
    }
}
