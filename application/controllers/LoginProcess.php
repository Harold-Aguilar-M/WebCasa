<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginProcess extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // model charge login_model
        $this->load->model('login_model');
    }

    public function index($error = FALSE)
    {
        // check if session exists
        if ($this->session->has_userdata('nameUser')) {
            // if exists redirect home/display_file_ftp
            redirect('home/display_file_ftp');
        } else {
            // if not exists, redirect to the login view
            // $data = TRUE indicates a user data error
            $data['login_error'] = $error;
            $this->load->view('login', $data);
        }
    }

    public function login_start()
    {
        // check if session exists
        if ($this->session->has_userdata('nameUser')) {
            // if exists redirect home/display_file_ftp
            redirect('home/display_file_ftp');
        }

        if ($this->form_validation->run('login')) {

            $data = $this->input->post();

            $data['nameUser'] = mb_strtolower($data['nameUser']);

            if ($this->login_model->login($data['nameUser'], md5($data['passwordUser']))) {

                $this->session->set_userdata('nameUser', $data['nameUser']);
                redirect('home/display_file_ftp');
            } else {

                $this->index($error = TRUE);
            }
        } else {
            $this->index($error = FALSE);
        }
    }

    public function logout()
    {
        $files = glob('/var/www/html/tmp/*'); // get all files 
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file); // delete file
        }
        rmdir('/var/www/html/tmp/'); //delete directory
        $this->session->sess_destroy(); // destroy session
        redirect('LoginProcess'); // redirecct to LoginProcess
    }
}

/* End of file Login.php */
