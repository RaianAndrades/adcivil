<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos_clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
			$this->load->model('processos_clientes_model', 'processos_clientes');
			$this->load->helper('form');
			$this->load->library('table');	
		}	else {
				redirect(base_url('login'));
		}
	}

	function excluir($idProcesso_Cliente) {
		if(!isset($idProcesso_Cliente)){
					redirect(base_url('admin/processos'));
				} else 
		$idProcesso = $this->processos_clientes->selecionar_idProcesso($idProcesso_Cliente);
		if($this->processos_clientes->excluir($idProcesso_Cliente)){

			foreach($idProcesso as $i)

			redirect(base_url('admin/processos/cadastrar_processo_cliente/' . $i->idProcesso));
		} else {
			die ("Não foi possivel excluir o cliente deste processo.");
		}
	}


}

