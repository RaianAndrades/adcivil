<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_controller {
	
	public function __construct(){
			parent::__construct();

			if($this->session->userdata('logged_in')){
			$this->load->helper("form");
			$this->load->model('processos_audiencias_model', 'processos_audiencias');
			$this->load->model('processos_model', 'processos');
			$this->load->model('clientes_model', 'clientes');
			$this->load->model('advogados_model', 'advogados');
		} else {
			redirect(base_url('login'));
		}
	}

	public function index() {
		$data['processos_audiencias'] = $this->processos_audiencias->audiencias_lista_inicio();
		$data['processos'] = $this->processos->processos_lista_inicio();
		$data['clientes'] = $this->clientes->listar_clientes_aniversario();
		$data['advogados'] = $this->advogados->listar_advogados_aniversario();
		$this->load->view('admin/home', $data);
	}

	 public function erros() {
	 	$this->load->view('erro_404');
	 }

}