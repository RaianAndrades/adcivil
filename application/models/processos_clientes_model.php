<?php
class Processos_clientes_model extends CI_Model {
	var $idProcesso_Cliente;
	var $idProcesso;
	var $idCliente;

	function __construct(){
		parent::__construct();
	}

	public function listar_processos_clientes(){
		return $this->db->get('processos_clientes');
	}

	// public function listar_id_processos_clientes($id){
	// 	$this->db->select('idProcesso');
	// 	$this->db->from('processos');
	// 	$this->db->where('idProcesso', $id);
	// 	return $this->db->get()->result();
	// }

	function adicionar_cliente($idProcesso, $idCliente){
		$this->idProcesso = $idProcesso;
		$this->idCliente = $idCliente;
		return $this->db->insert('processos_clientes', $this);
	}

	function excluir($idProcesso_Cliente) {
		$this->db->where('idProcesso_Cliente', $idProcesso_Cliente);
		return $this->db->delete('processos_clientes');
	}


	public function processos_lista_clientes($id){
		$this->db->select('idProcesso_Cliente, p.idProcesso, p.numero_processo, c.idCliente, c.nome_cliente, c.cidade');
		$this->db->from ('processos_clientes as pc');
		$this->db->join ('processos as p', 'p.idProcesso = pc.idProcesso', 'INNER');
		$this->db->join ('clientes as c', 'c.idCliente = pc.idCliente');
		$this->db->where('pc.idProcesso', $id);
		$this->db->order_by('c.nome_cliente');
		return $this->db->get()->result();
	}

	public function processos_lista_clientes_np($busca){
		$this->db->select('idProcesso_Cliente, p.idProcesso, p.numero_processo, c.idCliente, c.nome_cliente, c.rg, c.telefoneOne, c.cidade');
		$this->db->from ('processos_clientes as pc');
		$this->db->join ('processos as p', 'p.idProcesso = pc.idProcesso', 'INNER');
		$this->db->join ('clientes as c', 'c.idCliente = pc.idCliente');
		$this->db->where('p.numero_processo', $busca);
		$this->db->order_by('c.nome_cliente');
		return $this->db->get()->result();
	}

	public function processos_lista_clientes_id($busca){
		$this->db->select('idProcesso_Cliente, p.idProcesso, p.numero_processo, c.idCliente, c.nome_cliente, c.rg, c.telefoneOne, c.cidade');
		$this->db->from ('processos_clientes as pc');
		$this->db->join ('processos as p', 'p.idProcesso = pc.idProcesso', 'INNER');
		$this->db->join ('clientes as c', 'c.idCliente = pc.idCliente');
		$this->db->where('p.idProcesso', $busca);
		$this->db->order_by('c.nome_cliente');
		return $this->db->get()->result();
	}

	public function selecionar_idProcesso($idProcesso_Cliente){
		$this->db->select('idProcesso');
		$this->db->from('processos_clientes');
		$this->db->where('idProcesso_Cliente', $idProcesso_Cliente);
		return $this->db->get()->result();
	}


}	