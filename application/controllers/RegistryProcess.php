<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RegistryProcess extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registry_model');
    }

    public function index()
    {
        $this->load->view('registry');
    }

    public function registry_user()
    {

        if ($this->form_validation->run('registry')) {

            $data = array(
                "nameUser" => mb_strtolower($this->input->post("nameUser")),
                "lastNameUser" => mb_strtolower($this->input->post("lastNameUser")),
                "passwordUser" => md5($this->input->post("passwordUser"))
            );

            if ($this->registry_model->registry($data)) {
                $this->create_user_dir($data);
            } else {
                echo 'Lo sentimos a ocurrido un error';
            }
        } else {
            $this->index();
        }
    }

    public function create_user_dir($data)
    {

        $config['hostname']  =  '192.168.100.93';
        $config['username']  =  'userftp';
        $config['password']  =  '12345';

        $this->ftp->connect($config);

        $path = '/archivos/' . $data['nameUser'] . '_' . $data['lastNameUser'] . '/';

        if ($this->ftp->mkdir($path,  0755)) {
            $this->ftp->close();
            redirect('LoginProcess');
        } else {
            die("error");
        }
    }

    public function string_check($str)
    {
        if (!strpos($str, " ")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
