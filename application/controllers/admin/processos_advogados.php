<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos_advogados extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
		$this->load->model('processos_advogados_model', 'processos_advogados');
		$this->load->model('audiencias_advogados_model', 'audiencias_advogados');
		$this->load->helper('form');
		$this->load->library('table');	
	} else {
		redirect(base_url('login'));
	}
		//$this->session->set_userdata('idProcesso');

	}	

	function excluir($idProcesso_Advogado) {
		if(!isset($idProcesso_Advogado)){
					redirect(base_url('admin/processos'));
				} else
		$idProcesso = $this->processos_advogados->selecionar_idProcesso($idProcesso_Advogado);
		if($this->processos_advogados->excluir($idProcesso_Advogado)){
			
			foreach($idProcesso as $i)


			redirect(base_url('admin/processos/cadastrar_processo_advogado/' . $i->idProcesso));
		} else {
			die ("Não foi possivel excluir o cliente deste processo.");
		}
	}

	public function selecionar_idProcesso($id){
		$this->db->select('idProcesso');
		$this->db->from('processos_audiencias');
		$this->db->where('idProcesso_Audiencia', $id);
		return $this->db->get()->result();
	}

	

	// function excluir($idProcesso_Advogado, $id) {
	// 	$id = $this->input->post('idProcesso');
	// 	$idProcesso_Advogado = $this->input->post('idProcesso_Advogado');
	// 	if($this->processos_advogados->excluir($idProcesso_Advogado, $id)){
	// 		redirect(base_url('admin/processos/cadastrar_processo_advogado/' . $id));
	// 	} else {
	// 		die ("Não foi possivel excluir o cliente deste processo.");
	// 	}
	// }

	// function excluir($idProcesso_Advogado) {
	 // 	//$id = $this->input->post('idProcesso');
	 // 	$dados['processos_advogados'] = $this->processos_advogados->processos_lista_advogados($id);
		
		// $this->db->where('idProcesso_Advogado', $id);

		// foreach ($id as $i) {
		// 	echo $id = $i['idProcesso'];
		// }
		// //$dados['processos'] = $this->db->get('processos')->result();
	 // 	$idProcesso_Advogado = $this->input->post('idProcesso_Advogado');
	 // 	if($this->processos_advogados->excluir($idProcesso_Advogado)){
	 // 		redirect(base_url('admin/processos/cadastrar_processo_advogado' . $id));
	 // 	} else {
	 // 		die ("Não foi possivel excluir o cliente deste processo.");
	 // 	}
	 // }


}