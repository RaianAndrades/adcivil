<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contato_proprietarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('proprietarios_model','proprietarios')
	}


	function excluir($idContato_proprietario) {
		if(!isset($idContato_proprietario)){
			redirect(base_url('admin/proprietarios'));
		} else 
		$idProprietario = $this->proprietarios->selecionar_idProprietario($idContato_proprietario);
		if($this->proprietarios->excluir($idContato_proprietario)){

			foreach($idProprietario as $i)
				redirect(base_url('admin/proprietarios/cadastrar_proprietario_contato/' . $i->idProprietario));
		} else {
			die("Não foi possivel excluir este contato");
		}
	}

	// public function ver($id){
	// 	if(!isset($id)){
	// 		redirect(base_url('admin/proprietarios'));
	// 	} else {
	// 		$this->load->helper('text');
	// 		$dados['proprietarios'] = $this
	// 	}
	// }

	public function adicionar_contato(){
		$fk_idTipo_Contato = $this->input->post('fk_idTipo_Contato');
		$fk_idProprietario = $this->input->post('fk_idProprietario');
		$descricao 		   = $this->input->post('descricao');
		if($this->proprietarios->adicionar_contato($fk_idTipo_Contato, $fk_idProprietario, $descricao)){
			redirect(base_url('admin/proprietarios/' . $fk_idProprietario));
		} else {
			die("Não foi possivel adicionar o contato ao proprietário.");
		}
	}

	function editar($id){
		if(!isset($id)){
			redirect(base_url('admin/proprietarios'));
		} else {
			$this->db->where('idContato', $id);
			$dados['contato_proprietarios'] = $this->db->get('contatos');

			$this->load->view('admin/proprietarios_contato_alterar'. $dados);
		}
	}


}