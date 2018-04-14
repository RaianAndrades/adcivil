<?php 
class Audiencias_advogados_model extends CI_Model{
	var $idAudiencia_Advogado;
	var $idAudiencia;
	var $idProcesso;
	var $idAdvogado;

	function __construct(){
		parent::__construct();
	}



	public function listar_audiencias_processos(){
		return $this->db->get('audiencias_advogados');
	}

	function adicionar_advogado_audiencia($idProcesso, $idAudiencia, $idAdvogado){
		$this->idProcesso = $idProcesso;
		$this->idAudiencia = $idAudiencia;
		$this->idAdvogado = $idAdvogado;
		return $this->db->insert('audiencias_advogados', $this);
	}

	function excluir($idAudiencia_Advogado){
		$this->db->where('idAudiencia_Advogado', $idAudiencia_Advogado);
		return $this->db->delete('audiencias_advogados');
	}

	public function audiencias_lista_advogados($id){
		$this->db->select('idAudiencia_Advogado, idAudiencia, p.idProcesso, p.numero_processo, a.idAdvogado, a.nome_advogado');
		$this->db->from('audiencias_advogados as aa');
		$this->db->join('processos as p','p.idProcesso = aa.idProcesso', 'INNER');
		$this->db->join('advogados as a','a.idAdvogado = aa.idAdvogado', 'INNER');
		$this->db->join('processos_audiencias as pa','aa.idAudiencia = pa.idProcesso_Audiencia', 'INNER');
		$this->db->where('idAudiencia', $id);
		return $this->db->get()->result();
	}




	 	function showAdvogadosAudiencia($id){
	 	$query = $this->db->select('idAudiencia, idProcesso, idAdvogado, a.nome_advogado')
	 		->from('processos_advogados as pa')
	 		->join('advogados as a','a.idAdvogado = pa.idAdvogado','INNER')
	 		->where('idProcesso', $id)
	 		->get();
	 		//return $this->db->get()
	 		if($query->result()){
	 			foreach($query->result() as $r){
	 				echo "<option value='" .$r->idAdvogado."'>". $r->nome_advogado . "</option>";
	 			}
	 		}

	 		// $res = $this->db->query("SELECT idAdvogado,
	 		// advogados.nome_advogado FROM processos_advogados  
	 		//INNER JOIN advogados ON advogados.idAdvogado = 
	 		//processos_advogados.idAdvogado");
		 	// $res = $this->db->query("INNER JOIN");
	 }

	 public function selecionar_idAudiencia($id){
	 	$this->db->select('idAudiencia');
	 	$this->db->from('audiencias_advogados');
	 	$this->db->where('idAudiencia_Advogado', $id);
	 	return $this->db->get()->result();
	 }
}