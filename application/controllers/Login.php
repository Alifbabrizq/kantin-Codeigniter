<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if($this->session->userdata('login_status') == TRUE){

			redirect('Home/dashboard');

		} else {
			$this->load->view('login_view');
		}
	}

	public function cek_login(){
		if($this->session->userdata('login_status') == FALSE){

			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->login_model->cek_user() == TRUE){
					redirect('Home/dashboard');
				} else {
					$this->session->set_flashdata('notif', 'Login gagal');
					redirect('Login/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
					redirect('Login/index');
			}

		} else {
			redirect('Home/dashboard');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
