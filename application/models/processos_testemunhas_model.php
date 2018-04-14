<?php
class Processos_testemunhas_model extends CI_Model {
	var $idProcesso_testemunha;
	var $idProcesso;
	var $nome_testemunha;
	var $email;
	var $telefoneOne;
	var $telefoneTwo;
	var $endereco;
	var $numero;
	var $bairro;
	var $cep;
	var $cidade;
	var $uf;

	function __construct(){
		parent::__construct();
	}

	public function listar_processos_testemunha(){
		return $this->db->get('processos_testemunhas');
	}

	function adicionar_testemunha($idProcesso, $nome_testemunha, $email, 
		$telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade, $uf){
		$this->idProcesso = $idProcesso;
		$this->nome_testemunha = $nome_testemunha;
		$this->email = $email;
		$this->telefoneOne = $telefoneOne;
		$this->telefoneTwo = $telefoneTwo;
		$this->endereco = $endereco;
		$this->numero = $numero;
		$this->bairro = $bairro;
		$this->cep = $cep;
		$this->cidade = $cidade;
		$this->uf = $uf;
		return $this->db->insert('processos_testemunhas', $this);
	}

	public function detalhes_processos_testemunhas_by_id($id){
		$this->db->where('idProcesso_testemunha', $id);
		$processos_testemunhas = $this->db->get('processos_testemunhas')->result();
		if (count($processos_testemunhas)==1) {
			foreach ($processos_testemunhas as $testemunha) {
				$this->idProcesso_testemunha = $testemunha->idProcesso_testemunha;
				$this->idProcesso = $testemunha->idProcesso;
				$this->nome_testemunha = $testemunha->nome_testemunha;
				$this->email = $testemunha->email;
				$this->telefoneOne = $testemunha->telefoneOne;
				$this->telefoneTwo = $testemunha->telefoneTwo;
				$this->endereco = $testemunha->endereco;
				$this->numero = $testemunha->numero;
				$this->bairro = $testemunha->bairro;
				$this->cep = $testemunha->cep;
				$this->cidade = $testemunha->cidade;
				$this->uf = $testemunha->uf;
			}
			$dados['processos_testemunhas'] = $this;
		} else {
			$dados['processos_testemunhas'] = null;
		}
		return $dados;
	}

	function excluir($idProcesso_testemunha){
		$this->db->where('idProcesso_testemunha', $idProcesso_testemunha);
		return $this->db->delete('processos_testemunhas');
	}

	public function processos_lista_testemunhas($id){
		$this->db->select('idProcesso_testemunha, p.idProcesso, p.numero_processo, pt.nome_testemunha, pt.telefoneOne, pt.cidade');
		$this->db->from('processos_testemunhas as pt');
		$this->db->join('processos as p', 'p.idProcesso = pt.idProcesso');
		$this->db->where('pt.idProcesso', $id);
		return $this->db->get()->result();
	}

	public function processos_lista_testemunhas_np($busca){
		$this->db->select('idProcesso_testemunha, p.idProcesso, p.numero_processo, pt.nome_testemunha, pt.telefoneOne, pt.cidade');
		$this->db->from('processos_testemunhas as pt');
		$this->db->join('processos as p', 'p.idProcesso = pt.idProcesso');
		$this->db->where('p.numero_processo', $busca);
		return $this->db->get()->result();
	}

	public function processos_lista_testemunhas_id($busca){
		$this->db->select('idProcesso_testemunha, p.idProcesso, p.numero_processo, pt.nome_testemunha, pt.telefoneOne, pt.cidade');
		$this->db->from('processos_testemunhas as pt');
		$this->db->join('processos as p', 'p.idProcesso = pt.idProcesso');
		$this->db->where('p.idProcesso', $busca);
		return $this->db->get()->result();
	}



	public function selecionar_idProcesso($idProcesso_testemunha){
		$this->db->select('idProcesso');
		$this->db->from('processos_testemunhas');
		$this->db->where('idProcesso_testemunha', $idProcesso_testemunha);
		return $this->db->get()->result();
	}

	// public function selecionar_idProcesso($idProcesso_testemunha){
	// 	$this->db->where('idProcesso_testemunha', $idProcesso_testemunha);
	// 	$processos = $this->db->get('processos_testemunhas')->result();
	// 	if (count($processos)==1) {
	// 		foreach ($processos as $processo) {
	// 			$this->idProcesso = $processo->idProcesso;
	// 		}
	// 		return $this;
	// 	}
	// }
}