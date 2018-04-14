<?php
class Processos_advogados_model extends CI_Model {
	var $idProcesso_Advogado;
	var $idProcesso;
	var $idAdvogado;

	function __construct(){
		parent::__construct();

		// $dadosProcesso = array(
		// 		'logged_in' => TRUE,
		// 		'idProcesso' => $id
		// 	); 
	}

	// 	function showAdvogadosAudiencia(){
	// 		// $res = $this->db->query("SELECT 'pa.idAdvogado, a.nome_advogado' FROM processos_advogados as pa inner join advogados as a on 'a.idAdvogado = pa.idAdvogado'");
	// 	$res = $this->db->query("SELECT pa.idAdvogado, advogados.nome_advogado FROM processos_advogados as pa inner join advogados as a on a.idAdvogado = pa.idAdvogado");
	// 	  if($res->result()) {
	// 	  	foreach($res->result() as $r){
	// 	  		echo "<option value='".$r->idAdvogado."'>". $r->nome_advogado . "</option>";
	// 	  	}
	//     }
	// }





	function showAdvogadosAudiencia($id){
		$query = $this->db->query("SELECT idProcesso_Advogado, pa.idAdvogado, a.nome_advogado, idProcesso FROM processos_advogados as pa  inner join advogados as a on a.idAdvogado = pa.idAdvogado where idProcesso = '".$id."'");
		return $query->result();
		  // if($res->result()) {
		  //	foreach($res->result() as $r){
		  	//	echo "<option value='".$r->idAdvogado."'>".$r->idAdvogado."</option>";
	
	}


	 	// function showAdvogadosAudiencia($id){
	 	// 	$res = $this->query("SELECT idAdvogado, ");
		 // //$dados['processos_audiencias']	= $this->db->select('pp.idProcesso_Audiencia ,pa.idProcesso, a.idAdvogado, a.nome_advogado');
		 // //$dados['processos_audiencias']	=	$this->db->from('processos_advogados as pa');
		 // //$dados['processos_audiencias']	=	$this->db->join('advogados as a','a.idAdvogado = pa.idAdvogado','INNER');
		 // //$dados['processos_audiencias']	=	$this->db->join('audiencias_advogados as aa');
		 // //$dados['processos_audiencias']	= 	$this->db->join('processos_audiencias as pp','pp.idProcesso_Audiencia = aa.idAudiencia','INNER');
		
		 // $dados['processos_audiencias']	= 	$this->db->where('pp.idProcesso_Audiencia', $id);
		 // 	if($dados->result()){
		 // 		foreach($dados->result() as $r){
		 // 			echo "<option value'".$r->idAdvogado."'>".$r->nome_advogado . "</option>";
		 // 		}
		 // 	}
		 // }

	// 	function showAdvogadosAudiencia($id){
	//  $data =	$this->db->select('idProcesso, idAdvogado, a.nome_advogado');
	//  $data =	$this->db->from('processos_advogados as pa');
	//  $data =	$this->db->join('advogados as a','a.idProcesso = pa.idProcesso');
	//  $data =	$this->db->where('idProcesso');
	// 	if($data->result()){
	// 		foreach($data->result() as $r){
	// 			echo "<option value'".$r->idAdvogado."'>".$r->nome_advogado . "</option>";
	// 		}
	// 	}

	// }

	//lista de advogados 
	public function listar_processos_advogados(){
		return $this->db->get('processos_advogados');
	}


	function adicionar_advogado($idProcesso, $idAdvogado){
		$this->idProcesso = $idProcesso;
		$this->idAdvogado = $idAdvogado;
		return $this->db->insert('processos_advogados', $this);
	}

	function excluir($idProcesso_Advogado) {
		$this->db->where('idProcesso_Advogado', $idProcesso_Advogado);
		return $this->db->delete('processos_advogados');
	}

		// function excluir($idProcesso_Advogado, $id) {
		// 	$this->db->where('idProcesso', $id);
		// 	$this->db->where('idProcesso_Advogado', $idProcesso_Advogado);
		// 	return $this->db->delete('processos_advogados');
		// }

	public function processos_lista_advogados($id){
		$this->db->select('pa.idProcesso_Advogado, p.idProcesso, p.numero_processo, a.idAdvogado, a.nome_advogado, a.cidade');
		$this->db->from ('processos_advogados as pa');
		$this->db->join ('processos as p', 'p.idProcesso = pa.idProcesso', 'INNER');
		$this->db->join ('advogados as a', 'a.idAdvogado = pa.idAdvogado','INNER');
		$this->db->where('p.idProcesso', $id);
		return $this->db->get()->result();
	}

	public function processos_lista_advogados_np($busca){
		$this->db->select('pa.idProcesso_Advogado, p.idProcesso, p.numero_processo, a.idAdvogado, a.nome_advogado, a.cidade, a.telefoneOne, a.rg');
		$this->db->from ('processos_advogados as pa');
		$this->db->join ('processos as p', 'p.idProcesso = pa.idProcesso', 'INNER');
		$this->db->join ('advogados as a', 'a.idAdvogado = pa.idAdvogado');
		$this->db->where('p.numero_processo', $busca);
		return $this->db->get()->result();
	}

	public function processos_lista_advogados_id($busca){
		$this->db->select('pa.idProcesso_Advogado, p.idProcesso, p.numero_processo, a.idAdvogado, a.nome_advogado, a.cidade, a.telefoneOne, a.rg');
		$this->db->from ('processos_advogados as pa');
		$this->db->join ('processos as p', 'p.idProcesso = pa.idProcesso', 'INNER');
		$this->db->join ('advogados as a', 'a.idAdvogado = pa.idAdvogado');
		$this->db->where('p.idProcesso', $busca);
		return $this->db->get()->result();
	}

	public function selecionar_idProcesso($idProcesso_Advogado){
		$this->db->select('idProcesso');
		$this->db->from('processos_advogados');
		$this->db->where('idProcesso_Advogado', $idProcesso_Advogado);
		return $this->db->get()->result();
	}

}