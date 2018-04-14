<?php
class Advogados_model extends CI_Model {
	var $idAdvogado;
	var $nome_advogado;
	var $numero_oab;
	var $rg;
	var $cpf;
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
	var $possui_filhos;
	var $nacionalidade;
	var $data_nascimento;
	var $possui_outra_graduacao;

	function __construct(){
		parent::__construct();
	}


	function showAdvogados(){
		$res = $this->db->query("SELECT idAdvogado, nome_advogado FROM advogados order by nome_advogado");
		  if($res->result()) {
		  	foreach($res->result() as $r){
		  		echo "<option value='".$r->idAdvogado."'>". $r->nome_advogado . "</option>";
		  	}
	    }
	}


	function carrega($idAdvogado) {
		$query = $this->db->query("SELECT * FROM advogados WHERE idAdvogado='".$idAdvogado."'");

		return $query->result();
	}

	public function listar_advogados(){
		$this->db->order_by('nome_advogado');
		return $this->db->get('advogados')->result();
	}

	// public function checar_cpf($cpf){
	// 	$result = "SELECT cpf FROM advogados WHERE cpf = '" . $cpf . "'";
	// 	// $this->db->select('cpf');
	// 	// $this->db->from('advogados');
	// 	// $this->db->where('cpf', $cpf);
	// 	if($result == 0){
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	public function listar_advogados_aniversario(){
		$this->db->select(' nome_advogado, data_nascimento');
		$this->db->limit(5);
		$this->db->from('advogados');
		$this->db->where('data_nascimento between NOW() and DATE_ADD(NOW(), INTERVAL 5 MONTH)');
		$this->db->order_by('data_nascimento');
		return $this->db->get()->result();
	}

	public function listar_advogados_aniversario_todos(){
		$this->db->select(' nome_advogado, data_nascimento');
		$this->db->from('advogados');
		$this->db->order_by('nome_advogado');
		return $this->db->get()->result();
	}

	public function listar_advogados_pag($limite, $offset){
		$this->db->limit($limite, $offset);
		//$l = $this->db->get('advogados');
		//$l = $this->db->order_by('nome_advogado');
		//return $l->result();
		$this->db->select('*');
		$this->db->from('advogados');
		$this->db->order_by('nome_advogado');
		return $this->db->get()->result();
	}

	// LISTAR PROCESSOS POR ADVOGADO

	public function advogado($advogado, $offset=null, $numero_itens=null) {
		$this->db->where('idAdvogado', $advogado);
		return $this->db->get('advogados', $numero_itens, $offset)->result();
	}



	public function detalhes_advogado_by_id($id) {
		$this->db->where('idAdvogado', $id);
		$advogados = $this->db->get('advogados')->result();
		if (count($advogados)==1) {
			foreach ($advogados as $advogado) {
				$this->idAdvogado 			  = $advogado->idAdvogado;
				$this->nome_advogado 		  = $advogado->nome_advogado;
				$this->numero_oab			  = $advogado->numero_oab;
				$this->rg 					  = $advogado->rg;
				$this->cpf 		  			  = $advogado->cpf;
				$this->email 				  = $advogado->email;
				$this->telefoneOne 			  = $advogado->telefoneOne;
				$this->telefoneTwo 			  = $advogado->telefoneTwo;
				$this->endereco 			  = $advogado->endereco;
				$this->numero 				  = $advogado->numero;
				$this->bairro 				  = $advogado->bairro;
				$this->cep 					  = $advogado->cep;
				$this->cidade 				  = $advogado->cidade;
				$this->uf 					  = $advogado->uf;
				$this->estado_civil 		  = $advogado->estado_civil;
				$this->possui_filhos 		  = $advogado->possui_filhos;
				$this->nacionalidade 		  = $advogado->nacionalidade;
				$this->data_nascimento 		  = $advogado->data_nascimento;
				$this->possui_outra_graduacao = $advogado->possui_outra_graduacao; 
			}
			$dados['advogado'] = $this;
			//ACRESCENTAR PROCESSOS POR ADVOGADO
		} else {
			$dados['advogado'] = null;
		}
		return $dados;
	}

	public function contar_itens_advogado_by_id($id){
		$this->db->select('count(*) as total');
		$this->db->from('advogados');
		$this->db->where('idAdvogado', $id);
		return $this->db->get()->result();

	}

	function adicionar($nome_advogado, $numero_oab, $rg, $cpf, $email, $telefoneOne, $telefoneTwo, $endereco, $numero,
		$bairro, $cep, $cidade, $uf, $estado_civil, $possui_filhos, $nacionalidade, $data_nascimento, $possui_outra_graduacao) {
			    $this->nome_advogado 		  = $nome_advogado;
				$this->numero_oab			  = $numero_oab;
				$this->rg 					  = $rg;
				$this->cpf 		 			  = $cpf;
				$this->email 				  = $email;
				$this->telefoneOne 			  = $telefoneOne;
				$this->telefoneTwo 			  = $telefoneTwo;
				$this->endereco 			  = $endereco;
				$this->numero 				  = $numero;
				$this->bairro 				  = $bairro;
				$this->cep 					  = $cep;
				$this->cidade 				  = $cidade;
				$this->uf 					  = $uf;
				$this->estado_civil 		  = $estado_civil;
				$this->possui_filhos 		  = $possui_filhos;
				$this->nacionalidade 		  = $nacionalidade;
				$this->data_nascimento 		  = date("Y-m-d h:i:s");
				$this->possui_outra_graduacao = $possui_outra_graduacao; 
					try{
						$this->db->insert('advogados', $this);
							return true;
						}catch(Exception $e){
							return false;
						}
				}




	function excluir($idAdvogado) {
		$this->db->where('idAdvogado', $idAdvogado);
		return $this->db->delete('advogados');
	}

	function get_advogado($advogado) {
		$this->db->where('idAdvogado', $advogado);
		$advogados = $this->db->get('advogados')->result();
		if (count($advogados)==1) {
			foreach($advogados as $advogado) {
				$this->idAdvogado 			  = $advogado->idAdvogado;
				$this->nome_advogado 		  = $advogado->nome_advogado;
				$this->numero_oab			  = $advogado->numero_oab;
				$this->rg 					  = $advogado->rg;
				$this->cpf 		  			  = $advogado->cpf;
				$this->email 				  = $advogado->email;
				$this->telefoneOne 			  = $advogado->telefoneOne;
				$this->telefoneTwo 			  = $advogado->telefoneTwo;
				$this->endereco 			  = $advogado->endereco;
				$this->numero 				  = $advogado->numero;
				$this->bairro 				  = $advogado->bairro;
				$this->cep 					  = $advogado->cep;
				$this->cidade 				  = $advogado->cidade;
				$this->uf 					  = $advogado->uf;
				$this->estado_civil 		  = $advogado->estado_civil;
				$this->possui_filhos 		  = $advogado->possui_filhos;
				$this->nacionalidade 		  = $advogado->nacionalidade;
				$this->data_nascimento 		  = $advogado->data_nascimento;
				$this->possui_outra_graduacao = $advogado->possui_outra_graduacao; 
			}
			return $this;
		}
	}

	// function gravar_alteracao($idAdvogado, $nome_advogado, $slug_advogado, $numero_oab, $rg, $cpg, $email, $telefoneOne, $telefoneTwo, $endereco, $numero,
	// 	$bairro, $cep, $cidade, $uf, $estado_civil, $possui_filhos, $nacionalidade, $data_nascimento, $possui_outra_graduacao) {
	// 			$this->idAdvogado             = $idAdvogado;
	// 			$this->nome_advogado 		  = $nome_advogado;
	// 			$this->slug_advogado		  = $slug_advogado;
	// 			$this->numero_oab			  = $numero_oab;
	// 			$this->rg 					  = $rg;
	// 			$this->cpf 					  = $cpf;
	// 			$this->email 				  = $email;
	// 			$this->telefoneOne 			  = $telefoneOne;
	// 			$this->telefoneTwo 			  = $telefoneTwo;
	// 			$this->endereco 			  = $endereco;
	// 			$this->numero 				  = $numero;
	// 			$this->bairro 				  = $bairro;
	// 			$this->cep 					  = $cep;
	// 			$this->cidade 				  = $cidade;
	// 			$this->uf 					  = $uf;
	// 			$this->estado_civil 		  = $estado_civil;
	// 			$this->possui_filhos 		  = $possui_filhos;
	// 			$this->nacionalidade 		  = $nacionalidade;
	// 			$this->data_nascimento 		  = $data_nascimento;
	// 			$this->possui_outra_graduacao = $possui_outra_graduacao; 
	// 			$this->db->where('idAdvogado', $this->idAdvogado);
	// 			return $this->db->update('advogados', $this);
	// }
}