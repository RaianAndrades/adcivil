<?php
class Clientes_model extends CI_Model {
	var $idCliente;
	var $nome_cliente;
	var $doc_cliente;
	var $rg;
	var $data_nascimento;
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
	var $renda;

	function __construct(){
		parent::__construct();
	}

		function showClientes(){
		$res = $this->db->query("SELECT idCliente, nome_cliente FROM clientes order by nome_cliente");
		  if($res->result()){
			foreach($res->result() as $r){
				echo "<option value='".$r->idCliente."'>". $r->nome_cliente . "</option>";
			}
		}
	}

	// function checar_cpf($cpf){
	// 	$query_str = "SELECT cpf FROM clientes WHERE cpf = '". $cpf . "'";
	// 	$result = $this->db->query($query_str);

	// 	if($result->num_rows() == 1){
	// 		echo 'cpf ja está cadastrado!';
	// 	}
	// }
	
	
	function carrega($idCliente) {
			$query = $this->db->query("SELECT * FROM clientes WHERE idCliente='".$idCliente."'");

		return $query->result();	
	}

	public function listar_clientes(){
		$this->db->order_by('nome_cliente');
		return $this->db->get('clientes')->result();
	}

	public function listar_clientes_aniversario(){
		$this->db->select(' nome_cliente, data_nascimento');
		$this->db->limit(5);
		$this->db->from('clientes');
		$this->db->where('data_nascimento between NOW() and DATE_ADD(NOW(), INTERVAL 5 MONTH)');
		$this->db->order_by('data_nascimento');
		return $this->db->get()->result();
	}

	public function listar_clientes_aniversario_todos(){
		$this->db->select(' nome_cliente, data_nascimento');
		$this->db->from('clientes');
		$this->db->order_by('nome_cliente');
		return $this->db->get()->result();
	}

			// $busca = $this->input->post('busca');
			// $data2['busca'] = $busca;
			// $this->db->like('nome_cliente',$busca);
			// $this->db->order_by('nome_cliente');
			// //$this->db->or_like('rg',$busca);
			// $data2['clientes'] = $this->db->get('clientes')->result();

	// public function buscar_clientes_pag($limite, $offset){
	// 		$this->db->limit($limite, $offset);

	// 		$busca = $this->input->post('busca');
	// 		$data2['busca'] = $busca;
	// 		$this->db->like('nome_cliente',$busca);
	// 		$this->db->order_by('nome_cliente');
	// 		//$this->db->or_like('rg',$busca);
	// 		$data2['clientes'] = $this->db->get('clientes')->result();
	// 		return $data2;
		
	// 	}


	 public function buscar_clientes_pag($limite, $offset, $busca){
	 		$this->db->limit($limite, $offset);

	 		//$data2['busca'] = $busca;
	 		$this->db->select('idCliente, nome_cliente, doc_cliente, rg, telefoneOne, cidade');
			$this->db->from('clientes');
	 		$this->db->like('nome_cliente',$busca);
	 		$this->db->order_by('nome_cliente');
	 		//$this->db->or_like('rg',$busca);
	 		//$this->db->where('nome_cliente', $busca)
	 		return $this->db->get()->result();
	 	}

	public function listar_clientes_pag($limite, $offset){
		$this->db->limit($limite, $offset);

		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->order_by('nome_cliente');
		return $this->db->get()->result();
		// $this->db->limit($limite, $offset);
		// $l = $this->db->get('clientes');
		// return $l->result();
	}


	public function cliente($cliente, $offset=null, $numero_itens=null){
		$this->db->where('idCliente', $cliente);
		return $this->db->get('clientes', $numero_itens, $offset)->result();
	}
	// public function LISTAR PROCESSOS POR CLIENTE

	public function detalhes_cliente_by_id($id) {
		$this->db->where('idCliente', $id);
		$clientes = $this->db->get('clientes')->result();
		if (count($clientes)==1) {
			foreach($clientes as $cliente) {
				 $this->idCliente 	  	= $cliente->idCliente;
				 $this->nome_cliente  	= $cliente->nome_cliente;
				 $this->doc_cliente 	= $cliente->doc_cliente;
				 $this->rg 			  	= $cliente->rg;
				 $this->data_nascimento = $cliente->data_nascimento;
				 $this->email 		  	= $cliente->email;
				 $this->telefoneOne   	= $cliente->telefoneOne;
				 $this->telefoneTwo   	= $cliente->telefoneTwo;
				 $this->endereco 	  	= $cliente->endereco;
				 $this->numero 		  	= $cliente->numero;
				 $this->bairro 		  	= $cliente->bairro;
				 $this->cep 		  	= $cliente->cep;
				 $this->cidade 		 	= $cliente->cidade;
				 $this->uf 			 	= $cliente->uf;
				 $this->estado_civil  	= $cliente->estado_civil;
				 $this->nacionalidade 	= $cliente->nacionalidade;
				 $this->profissao 	  	= $cliente->profissao;
				 $this->renda         	= $cliente->renda;
			}
			$dados['clientes'] = $this;
		}
		else {
			$dados['clientes'] = null;
		}
		return $dados;
	}

	public function contar_itens_cliente_by_id($id){
		$this->db->select('count(*) as total');
		$this->db->from('clientes');
		$this->db->where('idCliente', $id);
		return $this->db->get()->result();
	}
	

	

	function adicionar($nome_cliente, $doc_cliente, $rg, $data_nascimento,$email,$telefoneOne,$telefoneTwo,
			$endereco,$numero,$bairro,$cep,$cidade,$uf,$estado_civil,$nacionalidade,$profissao,$renda){
		//$this->idCliente = NULL;
		$this->nome_cliente   	= $nome_cliente;
		$this->doc_cliente      = $doc_cliente;
		$this->rg             	= $rg;
		$this->data_nascimento  = $data_nascimento;
		$this->email 		  	= $email;
		$this->telefoneOne    	= $telefoneOne;
		$this->telefoneTwo    	= $telefoneTwo;
		$this->endereco 	  	= $endereco;
		$this->numero 		  	= $numero;
		$this->bairro 		  	= $bairro;
		$this->cep 		      	= $cep;
		$this->cidade 		  	= $cidade;
		$this->uf 			  	= $uf;
		$this->estado_civil   	= $estado_civil;
		$this->nacionalidade  	= $nacionalidade;
		$this->profissao 	  	= $profissao;
		$this->renda          	= $renda;
		return $this->db->insert('clientes', $this);
	}

	function excluir($idCliente){
		$this->db->where('idCliente', $idCliente);
		return $this->db->delete('clientes');
	}

	function get_cliente($cliente){
		$this->db->where('idCliente', $cliente);
		$clientes = $this->db->get('clientes')->result();
		if (count($clientes)==1) {
			foreach ($clientes as $cliente) {
				$this->idCliente      	= $cliente->idCliente;
				$this->nome_cliente   	= $cliente->nome_cliente;
				$this->doc_cliente      = $cliente->doc_cliente;
				$this->rg             	= $cliente->rg;
				$this->data_nascimento  = $cliente->data_nascimento;
				$this->email 		  	= $cliente->email;
				$this->telefoneOne    	= $cliente->telefoneOne;
				$this->telefoneTwo    	= $cliente->telefoneTwo;
				$this->endereco 	  	= $cliente->endereco;
				$this->numero 		 	= $cliente->numero;
				$this->bairro 		  	= $cliente->bairro;
				$this->cep 		      	= $cliente->cep;
				$this->cidade 		  	= $cliente->cidade;
				$this->uf 			  	= $cliente->uf;
				$this->estado_civil   	= $cliente->estado_civil;
				$this->nacionalidade  	= $cliente->nacionalidade;
				$this->profissao 	  	= $cliente->profissao;
				$this->renda          	= $cliente->renda;
			}
			return $this;
		}
	}

	// function gravar_alteracao() {
	// 			$this->idCliente      	= $idCliente;
	// 			$this->nome_cliente   	= $nome_cliente;
	// 			$this->slug_cliente   	= $slug_cliente;
	// 			$this->cpf 			  	= $cpf;
	// 			$this->rg 			  	= $rg;
	// 			$this->data_nascimento  = $data_nascimento;
	// 			$this->email 		  	= $email;
	// 			$this->telefoneOne    	= $telefoneOne;
	// 			$this->telefoneTwo    	= $telefoneTwo;
	// 			$this->endereco 	  	= $endereco;
	// 			$this->numero 		  	= $numero;
	// 			$this->bairro 		  	= $bairro;
	// 			$this->cep 		      	= $cep;
	// 			$this->cidade 		  	= $cidade;
	// 			$this->uf 			  	= $uf;
	// 			$this->estado_civil   	= $estado_civil;
	// 			$this->nacionalidade  	= $nacionalidade;
	// 			$this->profissao 	  	= $profissao;
	// 			$this->renda          	= $renda;
	// 			$this->db->where('idCliente',$idCliente);
	// 			return $this->db->update('clientes', $this);
	// }
}