<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos_Testemunhas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
			$this->load->model('processos_model','processos');
			$this->load->model('processos_testemunhas_model', 'processos_testemunhas');
			$this->load->helper('form');
			$this->load->library('table');	
		}	else {
			redirect(base_url('login'));
		}
	}


	function excluir($idProcesso_Testemunha) {
		if(!isset($idProcesso_Testemunha)){
					redirect(base_url('admin/processos'));
				} else
		$idProcesso = $this->processos_testemunhas->selecionar_idProcesso($idProcesso_Testemunha);
		if($this->processos_testemunhas->excluir($idProcesso_Testemunha)){
			// $idProcesso = array('idProcesso' => $id);
			// $idProcesso = array(
			//  'idProcesso' => $this->processos_testemunhas->selecionar_idProcesso($idProcesso_Testemunha)
			// );
			//$idProcesso = array('idProcesso' => $id);
			 foreach($idProcesso as $i) 


			redirect(base_url('admin/processos/cadastrar_processo_testemunha/' . $i->idProcesso));
		} else {
			die ("Não foi possivel excluir a testemunha do processo.");
		}
	}

	public function ver($id)
		{
			if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else {
			$this->load->helper('text');
			$dados['processos_testemunhas'] = $this->processos_testemunhas->detalhes_processos_testemunhas_by_id($id);
		
			$this->load->view('admin/ver_testemunha', $dados);
		}
	}


	function adicionar_testemunha(){
		$idProcesso = $this->input->post('idProcesso');
		$nome_testemunha = $this->input->post('nome_testemunha');
		$email = $this->input->post('email');
		$telefoneOne = $this->input->post('telefoneOne');
		$telefoneTwo = $this->input->post('telefoneTwo');
		$endereco = $this->input->post('endereco');
		$numero = $this->input->post('numero');
		$bairro = $this->input->post('bairro');
		$cep = $this->input->post('cep');
		$cidade = $this->input->post('cidade');
		$uf = $this->input->post('uf');
		if($this->processos_testemunhas->adicionar_testemunha($idProcesso, $nome_testemunha,
			$email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep,
			$cidade, $uf)) {
			redirect(base_url('admin/processos/cadastrar_processo_testemunha/' . $idProcesso));
		} else {
			die ("Não foi possivel adicionar a testemunha ao processo.");
		}
	}

	function editar($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else {
		$this->db->where('idProcesso_testemunha', $id);
		$dados['processosTestemunha'] = $this->db->get('processos_testemunhas')->result();

		$this->load->view('admin/processos_testemunhas_alterar', $dados);
		}
	}

	function gravar_alteracao(){
		$id = $this->input->post('idProcesso_testemunha');
		$idProcesso = $this->input->post('idProcesso');	 
		$data['idProcesso'] = $this->input->post('idProcesso');	
		$data['nome_testemunha'] = $this->input->post('nome_testemunha');	
		$data['email'] = $this->input->post('email');	
		$data['telefoneOne'] = $this->input->post('telefoneOne');	
		$data['telefoneTwo'] = $this->input->post('telefoneTwo');	
		$data['endereco'] = $this->input->post('endereco');	
		$data['numero'] = $this->input->post('numero');	
		$data['bairro'] = $this->input->post('bairro');	
		$data['cep'] = $this->input->post('cep');	
		$data['cidade'] = $this->input->post('cidade');	
		$data['uf'] = $this->input->post('uf');	
		$this->db->where('idProcesso_Testemunha', $id);
		$this->db->update('processos_testemunhas', $data);

		redirect(base_url('admin/processos/cadastrar_processo_testemunha/' . $idProcesso));
	}

}	