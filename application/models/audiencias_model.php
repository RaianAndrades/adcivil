<?php
class Audiencias_model extends CI_Model {
	var $idAudiencia;
	var $idNumeroProcesso;
	var $data;
	var $horario;
	var $vara;
	var $cidade;
	var $tipo_audiencia;
	var $contato_cliente;
	var $observacao;

	function __construct() {
		parent::__construct();
	}

	public function audiencias_lista(){
		$this->db->select(' idAudiencia, p.numero_processo, data, horario, vara');
		$this->db->from('audiencias as a');
		$this->db->join('processos as p', 'p.idProcesso = a.idNumeroProcesso');
		$this->db->order_by('data');
		// $this->db->join('clientes as c', 'c.idCliente = a.idClienteAudiencia', 'INNER');
		// $this->db->join('advogados as d', 'd.idAdvogado = a.idAdvogadoUm', 'INNER');
		return $this->db->get()->result();

	}


	public function listar_audiencias(){
		return $this->db->get('audiencias')->result();
	}

	public function audiencias_lista_pag($limite, $offset){
		$this->db->limit($limite, $offset);

		$this->db->select(' idAudiencia, p.numero_processo, data, horario, vara, cidade');
		$this->db->from('audiencias as a');
		$this->db->join('processos as p', 'p.idProcesso = a.idNumeroProcesso');
		// $this->db->join('clientes as c', 'c.idCliente = a.idClienteAudiencia', 'INNER');
		// $this->db->join('advogados as d', 'd.idAdvogado = a.idAdvogadoUm', 'INNER');
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

		//public function Listar audiencias pro clientes, advogados

	public function detalhes_audiencia_by_id($id){
		$this->db->where('idAudiencia', $id);
		$audiencias = $this->db->get('audiencias')->result();
		if (count($audiencias)==1) {
			foreach($audiencias as $audiencia) {
				$this->idAudiencia = $audiencia->idAudiencia;
				$this->idNumeroProcesso = $audiencia->idNumeroProcesso;
				$this->data = $audiencia->data;
				$this->horario = $audiencia->horario;
				$this->vara = $audiencia->vara;
				$this->cidade = $audiencia->cidade;
				$this->tipo_audiencia = $audiencia->tipo_audiencia;
				$this->contato_cliente = $audiencia->contato_cliente;
				$this->observacao = $audiencia->observacao;
			}
			$dados['audiencias'] = $this;
			//ACRESCENTAR AUDIENCIAS POR CLIENTE, ADVOGADO...
		} else {
			$dados['audiencias'] = null;
		}
		return $dados;
	}

	function adicionar( $idNumeroProcesso, $data, $horario,
			 $vara, $tipo_audiencia,
			$contato_cliente, $observacao) {

				$this->idNumeroProcesso = $idNumeroProcesso;
				$this->data = $data;
				$this->horario = $horario;
				$this->vara = $vara;
				$this->cidade = $cidade;
				$this->tipo_audiencia = $tipo_audiencia;
				$this->contato_cliente = $contato_cliente;
				$this->observacao = $observacao;
				return $this->db->insert('audiencias', $this);
	}
	
	function excluir($idAudiencia) {
		$this->db->where('idAudiencia', $idAudiencia);
		return $this->db->delete('audiencias');
	}		

	function get_audiencia($audiencia) {
		$this->db->where('idAudiencia', $audiencia);
		$audiencias = $this->db->get('audiencias')->result();
		if (count($audiencias)==1) {
			foreach ($audiencias as $audiencia) {
				$this->idAudiencia = $audiencia->idAudiencia;
				$this->idNumeroProcesso = $audiencia->idNumeroProcesso;
				$this->data = $audiencia->data;
				$this->horario = $audiencia->horario;
				$this->vara = $audiencia->vara;
				$this->cidade = $audiencia->cidade;
				$this->tipo_audiencia = $audiencia->tipo_audiencia;
				$this->contato_cliente = $audiencia->contato_cliente;
				$this->observacao = $audiencia->observacao;
			}
			return $this;
		}
	}	

	// function editar($audiencia) {
	// 	$dados['getAudiencia'] = $this->audiencia->get_audiencia($audiencia);
	// 	$dados['clientes'] = $this->clientes->listar_clientes();
	// 	$dados['advogados'] = $this->advogados->listar_advogados();
	// 	$dados['processos'] = $this->advogados->listar_processos();
	// 	$this->load->view('admin/audiencias_dois', $dados);
	// 	$this->load->view('admin/html_footer');
	// }


	// function gravar_alteracao($idAudiencia, $slug_audiencia, $idNumeroProcesso, $data, $horario,
	// 		$idClienteAudiencia, $idAdvogadoUm, $idAdvogadoDois, $vara, $tipo_audiencia,
	// 		$contato_cliente, $observacao) {

	// 			$this->slug_audiencia = $slug_audiencia;
	// 			$this->idNumeroProcesso = $idNumeroProcesso;
	// 			$this->data = $data;
	// 			$this->horario = $horario;
	// 			$this->idClienteAudiencia = $idClienteAudiencia;
	// 			$this->idAdvogadoUm = $idAdvogadoDois;
	// 			$this->idAdvogadoDois = $idAdvogadoDois;
	// 			$this->vara = $vara;
	// 			$this->tipo_audiencia = $tipo_audiencia;
	// 			$this->contato_cliente = $contato_cliente;
	// 			$this->observacao = $observacao;
	// 			return $this->db->update('audiencias', $this);
	// }
}