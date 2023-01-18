<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function init_session()
	{
		$nameUser = $this->session->userdata('nameUser');
		$lastNameUser = $this->home_model->get_data_user($nameUser);
		$this->session->set_userdata('lastNameUser', $lastNameUser);
		$this->session->set_userdata('directoryUser', $nameUser . '_' . $lastNameUser);
		return;
	}

	public function display_file_ftp()
	{
		// check if session exists
		if (!$this->session->has_userdata('nameUser')) {
			// if not exists, redirect LoginProcess
			redirect('LoginProcess');
		}

		$this->init_session();
		$this->ftp->connect();

		$directoryUser = $this->session->userdata('directoryUser');
		$path = '/archivos/' . $directoryUser . '/';

		if(!file_exists('/var/www/html/tmp/')){
			mkdir('/var/www/html/tmp/', 0777);
		}

		if (!$this->ftp->list_files($path)) {
			$this->load->view('home');
		} else {
			$file_list = $this->ftp->list_files($path);
			foreach ($file_list as $file) {
				
				$info_file = pathinfo($file);

				//copy file in /tmp/
				$local_file = '/var/www/html/tmp/' . $info_file['basename'];
				$this->ftp->download($file, $local_file, 'auto');
				
				// get file name
				$temp_file_name[] = $info_file['filename'];

				// get file extension
				$temp_file_extension[] = $info_file['extension'];
			}
			$data['file_name'] = $temp_file_name;
			$data['file_extension'] = $temp_file_extension;

			$this->load->view('home', $data);
		}
	}

	public function upload_file_ftp()
	{
		$this->ftp->connect();
		$file_local_path = $_FILES['file']['tmp_name'];
		$file_local_name = str_replace(' ', '_', $_FILES['file']['name']);
		$directoryUser = $this->session->userdata('directoryUser');
		$remote_path = '/archivos/' . $directoryUser . '/';
		if (!$this->ftp->upload($file_local_path, $remote_path . '/' . $file_local_name, 'auto', '0775'))
			die("No se subio el archivo");
		$this->ftp->close();
		$this->display_file_ftp();
	}

	public function download_file_ftp($file)
	{
		$directoryUser = $this->session->userdata('directoryUser');
		$remote_path = '/archivos/' . $directoryUser . '/';
		$path = 'ftp://userftp:12345@192.168.100.93' . $remote_path . $file;
		force_download($path, NULL);

		$this->display_file_ftp();
	}

	public function delete_file_ftp()
	{
		$this->ftp->connect();

		$file_name_delete = $this->input->post("file_name_delete");
		$file_extension_delete = $this->input->post("file_extension_delete");
		$directoryUser = $this->session->userdata('directoryUser');

		$file_delete = '/archivos/' . $directoryUser . '/' . $file_name_delete . '.' . $file_extension_delete;

		$this->ftp->connect();
		$this->ftp->delete_file($file_delete);
		$this->ftp->close();

		$this->display_file_ftp();
	}

	public function modify_file_ftp()
	{
		$new_name = str_replace(' ', '_', $this->input->post("new_name"));

		$old_name = $this->input->post("old_name");
		$file_extension = $this->input->post("file_extension");
		$directoryUser = $this->session->userdata('directoryUser');

		$remote_path = '/archivos/' . $directoryUser . '/';

		$old_name = $remote_path . $old_name . '.' . $file_extension;
		$new_name = $remote_path . $new_name . '.' . $file_extension;

		$this->ftp->connect();
		$this->ftp->rename($old_name, $new_name);
		$this->ftp->close();

		$this->display_file_ftp();
	}

}
