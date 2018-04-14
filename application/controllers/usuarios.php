<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('admin/home');
		} else {
			$this->login_usuario();
		}
	}


	function login_usuario(){
		$this->load->library('form_validation');
		$this->load->model('Admin_model');

		 $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[15]|xss_clean');
		 $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[20]|xss_clean');

		// if($this->form_validation->run() == FALSE){
		// 	$this->load->view('home_view');
		// } else {
			extract($_POST); //login do usuario

			$id = $this->Admin_model->checar_login($username, $password);

			if (!$id) { //falhou o login

				$this->session->set_flashdata('login_error', TRUE);
				redirect('login');
			} else {
				$data = array(
					'logged_in' => TRUE,
					'id' => $id,
					'username' => $username,
					'email' => $email,
					'nome' => $nome,
					 'access' => $this->Admin_model->acesso_usuario('usuarios','access')
					);
				$this->session->set_userdata($data);
				redirect('admin/home');
			}
		//}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}