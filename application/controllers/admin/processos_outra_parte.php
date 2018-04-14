<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos_Outra_Parte extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
			$this->load->model('processos_outra_parte_model', 'processos_outra_parte');
			$this->load->helper('form');
			$this->load->library('table');	
		}	else {
			redirect(base_url('login'));
		}
	}

	function excluir($idProcesso_Outra_Parte) {
		if(!isset($idProcesso_Outra_Parte)){
					redirect(base_url('admin/processos'));
				} else
		$idProcesso = $this->processos_outra_parte->selecionar_idProcesso($idProcesso_Outra_Parte);
		if($this->processos_outra_parte->excluir($idProcesso_Outra_Parte)){
			
			foreach($idProcesso as $i)

			redirect(base_url('admin/processos/cadastrar_processo_outra_parte/' . $i->idProcesso));
		} else {
			die ("Não foi possivel excluir a outra parte do processo.");
		}
	}

	public function ver($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else {
		$this->load->helper('text');
		$dados['processos_outra_parte'] = $this->processos_outra_parte->detalhes_processos_outra_parte_by_id($id);
	
		$this->load->view('admin/ver_outra_parte', $dados);
		}
	}


	function adicionar_outra_parte(){
		//$idProcesso_Outra_Parte = $this->input->post('idProcesso_Outra_Parte');
		$idProcesso = $this->input->post('idProcesso');
		$nome_outra_parte = $this->input->post('nome_outra_parte');
		$email = $this->input->post('email');
		$telefoneOne = $this->input->post('telefoneOne');
		$telefoneTwo = $this->input->post('telefoneTwo');
		$endereco = $this->input->post('endereco');
		$numero = $this->input->post('numero');
		$bairro = $this->input->post('bairro');
		$cep = $this->input->post('cep');
		$cidade = $this->input->post('cidade');
		$uf = $this->input->post('uf');
		$estado_civil = $this->input->post('estado_civil');
		$nacionalidade = $this->input->post('nacionalidade');
		$profissao = $this->input->post('profissao');
		if ($this->processos_outra_parte->adicionar_outra_parte($idProcesso, $nome_outra_parte,
			$email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade,
			$uf, $estado_civil, $nacionalidade, $profissao)) {
			redirect(base_url('admin/processos/cadastrar_processo_outra_parte/' . $idProcesso));
		} else {
			die ("Não foi possivel adicionar o advogado ao processo.");
		}
	}

	function editar($id) {
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else {
		$this->db->where('idProcesso_Outra_Parte', $id);
		$dados['processosOutra'] = $this->db->get('processos_outra_parte')->result();

		$this->load->view('admin/processos_outra_parte_alterar', $dados);
		}
	}


	function gravar_alteracao(){
		$id = $this->input->post('idProcesso_Outra_Parte');
		$idProcesso = $this->input->post('idProcesso');
		$data['idProcesso'] = $this->input->post('idProcesso');
		$data['nome_outra_parte'] = $this->input->post('nome_outra_parte');
		$data['email'] = $this->input->post('email');
		$data['telefoneOne'] = $this->input->post('telefoneOne');
		$data['telefoneTwo'] = $this->input->post('telefoneTwo');
		$data['endereco'] = $this->input->post('endereco');
		$data['numero'] = $this->input->post('numero');
		$data['bairro'] = $this->input->post('bairro');
		$data['cep'] = $this->input->post('cep');
		$data['cidade'] = $this->input->post('cidade');
		$data['uf'] = $this->input->post('uf');
		$data['estado_civil'] = $this->input->post('estado_civil');
		$data['nacionalidade'] = $this->input->post('nacionalidade');
		$data['profissao'] = $this->input->post('profissao');
		$this->db->where('idProcesso_Outra_Parte', $id);
		$this->db->update('processos_outra_parte', $data);

		redirect(base_url('admin/processos/cadastrar_processo_outra_parte/' . $idProcesso));
	}

}	