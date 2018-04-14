<?php
class Processos_audiencias_model extends CI_Model {
	var $idProcesso_Audiencia;
	var $idProcesso;
	var $data;
	var $horario;
	var $vara;
	var $cidade;
	var $tipo_audiencia;
	var $observacao;

	function __construct(){
		parent::__construct();
	}


	public function audiencias_lista_pag($limite, $offset){
		$this->db->limit($limite, $offset);

		$this->db->select(' idProcesso_Audiencia, pa.idProcesso, p.numero_processo, data, horario, vara, cidade');
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
		// $this->db->join('clientes as c', 'c.idCliente = a.idClienteAudiencia', 'INNER');
		// $this->db->join('advogados as d', 'd.idAdvogado = a.idAdvogadoUm', 'INNER');
		$this->db->order_by('data');
		return $this->db->get()->result();
	}


	public function audiencias_lista(){
		$this->db->select(' idProcesso_Audiencia, data, pa.idProcesso, p.numero_processo, horario, vara');
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso','INNER');
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	//WHERE data between NOW() and DATE_ADD(NOW(), INTERVAL 1 MONTH)

	public function audiencias_lista_inicio(){

		$this->db->select(' idProcesso_Audiencia, pa.idProcesso, p.numero_processo, data, horario, vara, cidade');
		$this->db->limit(5);
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
		$this->db->where('data between NOW() and DATE_ADD(NOW(), INTERVAL 5 MONTH)');
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	public function detalhes_audiencia_by_id($id){
		$this->db->where('idProcesso_Audiencia', $id);
		$audiencias = $this->db->get('processos_audiencias')->result();
		if (count($audiencias)==1) {
			foreach($audiencias as $audiencia) {
				$this->idProcesso_Audiencia = $audiencia->idProcesso_Audiencia;
				$this->idProcesso = $audiencia->idProcesso;
				$this->data = $audiencia->data;
				$this->horario = $audiencia->horario;
				$this->vara = $audiencia->vara;
				$this->cidade = $audiencia->cidade;
				$this->tipo_audiencia = $audiencia->tipo_audiencia;
				$this->observacao = $audiencia->observacao;
			}
			$dados['processos_audiencias'] = $this;
			//ACRESCENTAR AUDIENCIAS POR CLIENTE, ADVOGADO...
		} else {
			$dados['processos_audiencias'] = null;
		}
		return $dados;
	}

	public function listar_processos_audiencia(){
		return $this->db->get('processos_audiencias');
	}

	function adicionar_audiencia($idProcesso, $data, $horario, $vara, $cidade, $tipo_audiencia, $observacao){
		$this->idProcesso = $idProcesso;
		$this->data = $data;
		$this->horario = $horario;
		$this->vara = $vara;
		$this->cidade = $cidade;
		$this->tipo_audiencia = $tipo_audiencia;
		$this->observacao = $observacao;
		return $this->db->insert('processos_audiencias', $this);
	}

	function excluir($idProcesso_Audiencia){
		$this->db->where('idProcesso_Audiencia', $idProcesso_Audiencia);
		return $this->db->delete('processos_audiencias');
	}

	public function processos_lista_audiencias($id){
		$this->db->select('idProcesso_Audiencia, pa.idProcesso, p.numero_processo, data,  horario, cidade');
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
		$this->db->where('pa.idProcesso', $id);
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	public function processos_lista_audiencias_np($busca){
		$this->db->select('idProcesso_Audiencia, pa.idProcesso, p.numero_processo, data, horario, cidade, vara');
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
		$this->db->where('p.numero_processo', $busca);
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	public function processos_lista_audiencias_id($busca){
		$this->db->select('idProcesso_Audiencia, pa.idProcesso, p.numero_processo, data, horario, cidade, vara');
		$this->db->from('processos_audiencias as pa');
		$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
		$this->db->where('p.idProcesso', $busca);
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	public function pesquisar_audiencias_entre_datas($dataOne, $dataTwo){
		$query = $this->db->query("SELECT * FROM processos_audiencias WHERE data between " . $dataOne . "  and " .$dataTwo." order by data ");
		return $query->result();
		 //$this->db->select('*');
		 //$this->db->from('processos_audiencias');
		 //$this->db->where('data >=', $dataOne);
		 //$this->db->where('data <=', $dataTwo);
		 //$this->db->order_by('data');
		 //return $this->db->get()->result();
		 // $this->db->where('data between "' . date('Y-m-d', strtotime($dataOne)) . '" and  "' . date('Y-m-d', strtotime($dataTwo)) . '" ');
	}

	public function selecionar_idProcesso($idProcesso_Audiencia)
	{
		$this->db->select('idProcesso');
		$this->db->from('processos_audiencias');
		$this->db->where('idProcesso_Audiencia', $idProcesso_Audiencia);
		return $this->db->get()->result();
	}


	// public function processos_lista_audiencias($id){
	// 	$this->db->select('pa.idProcesso_Audiencia, pa.idProcesso, p.numero_processo, pa.data, pa.horario, pa.cidade');
	// 	$this->db->from('processos_audiencias as pa');
	// 	$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
	// 	$this->db->where('pa.idProcesso', $id);

	// 	$this->db->get('processos_audiencias')->result();
	// 	$dados['lista_audiencias'] = $this;
	// 	return $dados;
	// }

	// 	public function processos_lista_audiencias($id){
	// 	$this->db->select('pa.idProcesso_Audiencia, pa.idProcesso, p.numero_processo, pa.data, pa.horario, pa.cidade');
	// 	$this->db->from('processos_audiencias as pa');
	// 	$this->db->join('processos as p', 'p.idProcesso = pa.idProcesso');
	// 	$this->db->where('pa.idProcesso', $id);
	// 	return $this->db->get('processos_audiencias')->result();
	// }

	
}