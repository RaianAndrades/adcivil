<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos_Honorarios extends CI_Controller {

	public function __construct(){
		parent::__construct();

			if($this->session->userdata('logged_in')){
				$this->load->model('processos_honorarios_model', 'processos_honorarios');
				$this->load->helper('form');
				$this->load->library('table');
			} else {
				redirect(base_url('login'));
			}
		}

	function excluir($idProcesso_Honorario) {
		if(!isset($idProcesso_Honorario)){
					redirect(base_url('admin/processos'));
				} else
		$idProcesso = $this->processos_honorarios->selecionar_idProcesso($idProcesso_Honorario);
		if($this->processos_honorarios->excluir($idProcesso_Honorario)){
			
			foreach($idProcesso as $i)

			redirect(base_url('admin/processos/cadastrar_processo_honorario/' . $i->idProcesso));
		} else {
			die("Não foi possivel excluir o pagamento.");
		}
	}

	public function ver($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else {
		$this->load->helper('text');
		$dados['processos_honorarios'] = $this->processos_honorarios->detalhes_processos_honorarios_by_id($id);
		$this->load->view('admin_ver_honorario', $dados);
		}
	}

	public function adicionar_honorario(){
		$idProcesso = $this->input->post('idProcesso');
		$valor_pago = $this->input->post('valor_pago');
		$data = $this->input->post('data');
		if($this->processos_honorarios->adicionar_honorario($idProcesso, $valor_pago, $data)){
			redirect(base_url('admin/processos/cadastrar_processo_honorario/' . $idProcesso));
		} else {
			die("Não foi possivel adicionar o pagamento do honorário.");
		}
	}

	function editar($id){
		if(!isset($id)){
					redirect(base_url('admin/clientes'));
				} else {
		$this->db->where('idProcesso_Honorario', $id);
		$dados['processosHonorarios'] = $this->db->get('processos_honorarios');

		$this->load->view('admin/processos_honorarios_alterar', $dados);
		}
	}

	// function gravar_alteracao(){
	// 	$id = $this->input->post('idProcesso_Honorario');
	// 	$idProcesso = $this->input->post('idProcesso');
	// 	$data['idProcesso'] = $this->input->post('idProcesso');
	// 	$data['valor_pago'] = $this->input->post('valor_pago');
	// 	$data['data'] = $this->input->post('data');
	// 	$this->db->where('idProcesso_Honorario', $id);
	// 	$this->db->update('processos_honorarios', $data);

	// 	redirect(base_url('admin/processos/cadastrar_processo_honorario/' . $idProcesso));
	// }



}
