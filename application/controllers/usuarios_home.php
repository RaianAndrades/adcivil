<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_home extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	function home(){
		if($this->session->userdata('logged_in')){

			$this->load->model('Admin_model');
			
			$data['user'] = $this->session->userdata('id');// busca id do usuario logado na sessão.
			$data['user'] = $this->session->userdata('username'); 

			$this->load->view('admin/home', $data);
		} else {
			redirect('login');
		}
	}

}