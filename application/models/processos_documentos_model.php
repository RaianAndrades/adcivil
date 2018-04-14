<?php
class Processos_documentos_model extends CI_Model {
	var $idProcesso_Documento;
	var $idProcesso;
	var $documento;

	function __construct(){
		parent::__construct();
	}

	public function listar_processos_documentos(){
		return $this->db->get('processos_documentos');
	}

	function adicionar_documento($idProcesso, $documento){
		$this->idProcesso = $idProcesso;
		$this->documento = $documento;
		return $this->db->insert('processos_documentos', $this);
	}

	function excluir($idProcesso_Documento){
		$this->db->where('idProcesso_Documento', $idProcesso_Documento);
		return $this->db->delete('processos_documentos');
	}

	public function processos_lista_documentos($id){
		$this->db->select('idProcesso_Documento, p.idProcesso, p.numero_processo, documento');
		$this->db->from('processos_documentos as pd');
		$this->db->join('processos as p', 'p.idProcesso = pd.idProcesso');
		$this->db->where('pd.idProcesso', $id);
		return $this->db->get()->result();
	}

	public function selecionar_idProcesso($idProcesso_Documento){
		$this->db->select('idProcesso');
		$this->db->from('processos_documentos');
		$this->db->where('idProcesso_Documento', $idProcesso_Documento);
		return $this->db->get()->result();
	}
}