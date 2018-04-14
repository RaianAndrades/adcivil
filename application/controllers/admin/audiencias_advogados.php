<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Audiencias_advogados extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
		$this->load->model('processos_advogados_model', 'processos_advogados');
		$this->load->model('processos_audiencias_model', 'processos_audiencias');
		$this->load->model('audiencias_advogados_model', 'audiencias_advogados');
		$this->load->helper('form');
		$this->load->library('table');	
	}	else {
		redirect(base_url('login'));
	}
	}

	public function index(){
		$dados['advogados'] = $this->advogados->listar_advogados();
		$dados['processos_advogados'] = $this->processos_advogados->processos_lista_advogados($id);
		$dados['audiencias_advogados'] = $this->audiencias_advogados->audiencias_lista_advogados($id);
		$this->load->view('admin/audiencias_advogados', $dados);
	}

	function excluir($idAudiencia_Advogado){
		if(!isset($idAudiencia_Advogado)){
			redirect(base_url("admin/processos"));
		}else 
		$idAudienciaAdvogado = $this->audiencias_advogados->selecionar_idAudiencia($idAudiencia_Advogado);
		if($this->audiencias_advogados->excluir($idAudiencia_Advogado)){

			foreach($idAudienciaAdvogado as $aa) 

			redirect(base_url('admin/processos_audiencias/cadastrar_audiencia_advogado/' . $aa->idAudiencia));
		} else {
			die ("Não foi possivel excluir o advogado desta audiência");
		}
	}

	function adicionar_advogado_audiencia(){
		$idProcesso = $this->input->post('idProcesso');
		$idAudiencia = $this->input->post('idAudiencia');
		$idAdvogado = $this->input->post('idAdvogado');
		if($this->audiencias_advogados->adicionar_advogado_audiencia($idProcesso, $idAudiencia, $idAdvogado)) {
			redirect(base_url('admin/processos_audiencias/cadastrar_audiencia_advogado/' . $idAudiencia));
		} else {
			die ("Não foi possivel adicionar o advogado a esta audiência.");
		}
	}

}