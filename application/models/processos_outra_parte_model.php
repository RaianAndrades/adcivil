<?php
class Processos_outra_parte_model extends CI_Model {
	var $idProcesso_Outra_Parte;
	var $idProcesso;
	var $nome_outra_parte;
	var $email;
	var $telefoneOne;
	var $telefoneTwo;
	var $endereco;
	var $numero;
	var $bairro;
	var $cep;
	var $cidade;
	var $uf;
	var $estado_civil;
	var $nacionalidade;
	var $profissao;

	function __construct(){
		parent::__construct();
	}

	public function listar_processos_outra_parte(){
		return $this->db->get('processos_outra_parte');
	}

	public function detalhes_processos_outra_parte_by_id($id){
		$this->db->where('idProcesso_Outra_Parte', $id);
		$processos_outra_parte = $this->db->get('processos_outra_parte')->result();
		if (count($processos_outra_parte)==1) {
			foreach ($processos_outra_parte as $outra_parte) {
				$this->idProcesso_Outra_Parte = $outra_parte->idProcesso_Outra_Parte;
				$this->idProcesso = $outra_parte->idProcesso;
				$this->nome_outra_parte = $outra_parte->nome_outra_parte;
				$this->email = $outra_parte->email;	
				$this->telefoneOne = $outra_parte->telefoneOne;
				$this->telefoneTwo = $outra_parte->telefoneTwo;
				$this->endereco = $outra_parte->endereco;	
				$this->numero = $outra_parte->numero;
				$this->bairro = $outra_parte->bairro;
				$this->cep = $outra_parte->cep;	
				$this->cidade = $outra_parte->cidade;	
				$this->uf = $outra_parte->uf;		
				$this->estado_civil = $outra_parte->estado_civil;	
				$this->nacionalidade = $outra_parte->nacionalidade;	
				$this->profissao = $outra_parte->profissao;
			}
			$dados['processos_outra_parte'] = $this;
		}	else {
			$dados['processos_outra_parte'] = null;
		}	
		return $dados;
	}


	function adicionar_outra_parte($idProcesso, $nome_outra_parte, $email, $telefoneOne, $telefoneTwo, $endereco, $numero, 
		$bairro, $cep, $cidade, $uf, $estado_civil, $nacionalidade, $profissao){
		        $this->idProcesso = $idProcesso;
				$this->nome_outra_parte = $nome_outra_parte;
				$this->email = $email;	
				$this->telefoneOne = $telefoneOne;
				$this->telefoneTwo = $telefoneTwo;
				$this->endereco = $endereco;	
				$this->numero = $numero;
				$this->bairro = $bairro;
				$this->cep = $cep;	
				$this->cidade = $cidade;	
				$this->uf = $uf;		
				$this->estado_civil = $estado_civil;	
				$this->nacionalidade = $nacionalidade;	
				$this->profissao = $profissao;
				return $this->db->insert('processos_outra_parte', $this);
	} 

	function excluir($idProcesso_Outra_Parte){
		$this->db->where('idProcesso_Outra_Parte', $idProcesso_Outra_Parte);
		return $this->db->delete('processos_outra_parte');
	}

	public function processos_lista_outra_parte($id){
		$this->db->select('po.idProcesso_Outra_Parte, p.idProcesso, p.numero_processo, po.nome_outra_parte, po.telefoneOne, po.cidade');
		$this->db->from('processos_outra_parte as po');
		$this->db->join('processos as p', 'p.idProcesso = po.idProcesso');
		$this->db->where('po.idProcesso', $id);
		return $this->db->get()->result();
	}

	public function processos_lista_outra_parte_np($busca){
		$this->db->select('po.idProcesso_Outra_Parte, p.idProcesso, p.numero_processo, po.nome_outra_parte, po.telefoneOne, po.cidade');
		$this->db->from('processos_outra_parte as po');
		$this->db->join('processos as p', 'p.idProcesso = po.idProcesso');
		$this->db->where('p.numero_processo', $busca);
		return $this->db->get()->result();
	}

		public function processos_lista_outra_parte_id($busca){
		$this->db->select('po.idProcesso_Outra_Parte, p.idProcesso, p.numero_processo, po.nome_outra_parte, po.telefoneOne, po.cidade');
		$this->db->from('processos_outra_parte as po');
		$this->db->join('processos as p', 'p.idProcesso = po.idProcesso');
		$this->db->where('p.idProcesso', $busca);
		return $this->db->get()->result();
	}

	public function selecionar_idProcesso($idProcesso_Outra_Parte){
		$this->db->select('idProcesso');
		$this->db->from('processos_outra_parte');
		$this->db->where('idProcesso_Outra_Parte', $idProcesso_Outra_Parte);
		return $this->db->get()->result();
	}



		// public function processos_lista_outra_parte($id) {
	// 	$this->db->select('idProcesso_Outra_Parte, p.idProcesso, p.numero_processo, nome_outra_parte, telefoneOne, cidade');
	// 	$this->db->from('processos_outra_parte as po');
	// 	$this->db->join('processos as p','p.idProcesso = po.idProcesso');
	// 	$this->db->where('p.idProcesso', $id);
	// 	return $this->db->get()->result();
	// }
}