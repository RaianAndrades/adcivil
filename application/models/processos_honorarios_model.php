<?php
class Processos_honorarios_model extends CI_Model {
	var $idProcesso_honorario;
	var $idProcesso;
	var $valor_pago;
	var $data;

	function __construct(){
		parent::__construct();
	}

	public function listar_processos_honorarios(){
		return $this->db->get('processos_honorarios');
	}

	function adicionar_honorario($idProcesso, $valor_pago, $data){
		$this->idProcesso = $idProcesso;
		$this->valor_pago = $valor_pago;
		$this->data = $data;

		return $this->db->insert('processos_honorarios', $this);
	}

	public function detalhes_processos_honorarios_by_id($id){
		$this->db->where('idProcesso_honorario', $id);
		$processos_honorarios = $this->db->get('processos_honorarios')->result();
		if(count($processos_honorarios)==1) {
			foreach ($processos_honorarios as $honorario) {
				$this->idProcesso_honorario = $honorario->idProcesso_honorario;
				$this->idProcesso = $honorario->idProcesso;
				$this->valor_pago = $honorario->valor_pago;
				$this->data = $honorario->data;
			}
			$dados['processos_honorarios'] = $this;
		} else {
			$dados['processos_honorarios'] = null;
		}
		return $dados;
	}

	function excluir($idProcesso_honorario){
		$this->db->where('idProcesso_honorario', $idProcesso_honorario);
		return $this->db->delete('processos_honorarios');
	}

	public function processos_lista_honorarios($id){
		$this->db->select('idProcesso_honorario, ph.idProcesso, p.numero_processo, data, valor_pago');
		$this->db->from('processos_honorarios as ph');
		$this->db->join('processos as p', 'p.idProcesso = ph.idProcesso');
		$this->db->where('ph.idProcesso', $id);
		$this->db->order_by('data');
		return $this->db->get()->result();
	}

	public	function soma_honorarios($id){
		$this->db->select('SUM(valor_pago) as SOMA');
		$this->db->from('processos_honorarios');
		$this->db->where('idProcesso', $id);
		return $this->db->get()->result();
	}

	public function selecionar_idProcesso($idProcesso_honorario){
		$this->db->select('idProcesso');
		$this->db->from('processos_honorarios');
		$this->db->where('idProcesso_honorario', $idProcesso_honorario);
		return $this->db->get()->result();
	}


}