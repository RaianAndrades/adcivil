<?php
	

	class Pdf_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function listar_clientes() {
		$data = array();
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->order_by('nome_cliente');
		return $this->db->get()->result();

		// public function listar_clientes() {
		// $data = array();
		// $this->db->select('*');
		// $q = $this->db->get('clientes');
		// //$this->db->get('clientes')->result();
		// return $q->result();
		// $q->free_result();
	}

	public function listar_advogados() {
		$data = array();
		$this->db->select('*');
		$this->db->from('advogados');
		$this->db->order_by('nome_advogado');
		return $this->db->get()->result();
	}

	// public function processos_lista(){
	//    	$data = array();
	// 	$this->db->select(' idProcesso, numero_processo, c.nome_cliente, a.nome_advogado, tipo_de_acao, data_abertura');
	// 	$this->db->from('processos as p');
	// 	$this->db->join('clientes as c', 'c.idCliente = p.idClienteProcesso','INNER');
	// 	$this->db->join('advogados as a', 'a.idAdvogado = p.idAdvogadoUm', 'INNER');
	// 	$this->db->order_by('c.nome_cliente');
	// 	return $this->db->get()->result();
	// }
	 public function processos_lista(){
		$this->db->select(' idProcesso, numero_processo, tipo_de_acao, data_abertura');
			$this->db->from('processos ');
			return $this->db->get()->result();
		}

	// public function audiencias_lista(){
	// 	$data = array();
	// 	$this->db->select(' idAudiencia, p.numero_processo, c.nome_cliente, d.nome_advogado, data, horario, vara');
	// 	$this->db->from('audiencias as a');
	// 	$this->db->join('processos as p', 'p.idProcesso = a.idNumeroProcesso', 'INNER');
	// 	$this->db->join('clientes as c', 'c.idCliente = a.idClienteAudiencia', 'INNER');
	// 	$this->db->join('advogados as d', 'd.idAdvogado = a.idAdvogadoUm', 'INNER');
	// 	$this->db->order_by('data');
	// 	return $this->db->get()->result();

	// }

	public function audiencias_lista(){
		$this->db->select('idProcesso_Audiencia, pa.idProcesso, p.numero_processo, data, horario, cidade');
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	public function info_cliente($id){
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('idCliente', $id);
		return $this->db->get()->result();
	}
}
?>