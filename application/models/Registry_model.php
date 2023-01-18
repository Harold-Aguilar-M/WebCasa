<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registry_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function registry($data)
    {
        if ($this->db->insert('User', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file Login_model.php */

?>

