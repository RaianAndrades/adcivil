<?php
class Processos_model extends CI_Model {
	var $idProcesso;
	var $numero_processo;
	var $data_abertura;
	var $situacao_cliente;
	var $tipo_de_acao;

	var $relato_fatos;
	var $valor_causa;
	var $custas;
	var $honorarios;
	var $outras_despesas;
	var $situacao_conjugal;
	var $casado_regime;
	var $possui_filhos_menores;
	var $quantos_puberes;
	var $quantos_impuberes;
	var $quantos_maiores;
	var $possui_bens;
	var $quais;
	var $pretende_pensao_alimenticia;
	var $para_si;
	var $para_os_filhos;
	var $renda_alimentante;
	var $observacoes;


	function __construct(){
		parent::__construct();
	}

	function showProcessos(){
		$res = $this->db->query("SELECT idProcesso, numero_processo FROM processos ");
			if($res->result()){
				foreach($res->result() as $r){
					echo "<option value='".$r->idProcesso."'>". $r->numero_processo . "</option>";
			}
		}
	}

	public function listar_processos_relatorios(){
		$this->db->order_by('numero_processo');
		return $this->db->get('processos')->result();
	}

		public function processos_lista(){
	    //Recebendo os dados dos processos
		//$data['processos'] = $this->db->get('processos')->result();
		//Criando querys SQL com JOIN usando active record
		$this->db->select(' p.idProcesso, numero_processo, tipo_de_acao, data_abertura');
		$this->db->from('processos as p');
		$this->db->join('processos_clientes as pc','pc.idProcesso = p.idProcesso','INNER');
		$this->db->join('clientes as c', 'pc.idCliente = c.idCliente','INNER');
		$this->db->join('processos_testemunhas as pt','pt.idProcesso ','');
		$this->db->join('processos_advogados as pa','pa.idProcesso = p.idProcesso', 'INNER');
		$this->db->join('processos_outra_parte as po',' po.idProcesso','');
		$this->db->join('advogados as a','pa.idAdvogado = a.idAdvogado', 'INNER');
		
		$this->db->group_by('p.idProcesso');
		$this->db->order_by('data_abertura');
		return $this->db->get()->result();
	}


	// public function processos_lista($busca){
	//     //Recebendo os dados dos processos
	// 	//$data['processos'] = $this->db->get('processos')->result();
	// 	//Criando querys SQL com JOIN usando active record
	// 	$this->db->select(' p.idProcesso, numero_processo, tipo_de_acao, data_abertura');
	// 	$this->db->from('processos as p');
	// 	$this->db->join('processos_clientes as pc','pc.idProcesso = p.idProcesso','INNER');
	// 	$this->db->join('clientes as c', 'pc.idCliente = c.idCliente','INNER');
	// 	$this->db->join('processos_testemunhas as pt','p.idProcesso ');
	// 	$this->db->join('processos_advogados as pa','pa.idProcesso = p.idProcesso', 'INNER');
	// 	$this->db->join('processos_outra_parte as po','p.idProcesso = po.idProcesso');
	// 	$this->db->join('advogados as a','pa.idAdvogado = a.idAdvogado', 'INNER');
	// 	$this->db->like('nome_cliente',$busca);
	// 	$this->db->or_like('nome_advogado',$busca);
	// 	//$this->db->or_like('numero_processo', $busca);
	// 	$this->db->or_like('nome_testemunha', $busca);
	// 	$this->db->or_like('nome_outra_parte', $busca);
	// 	$this->db->group_by('p.idProcesso');
	// 	$this->db->order_by('data_abertura');
	// 	return $this->db->get()->result();
	// }


	// public function processos_lista(){
	//     //Recebendo os dados dos processos
	// 	//$data['processos'] = $this->db->get('processos')->result();
	// 	//Criando querys SQL com JOIN usando active record
	// 	$this->db->select(' p.idProcesso, numero_processo, tipo_de_acao, data_abertura');
	// 	$this->db->from('processos as p');
	// 	// $this->db->join('processos_testemunhas as pt','pc.idProcesso = p.idProcesso','INNER');
	// 	// $this->db->join('processos_clientes as pc','pc.idProcesso = p.idProcesso','INNER');
	// 	// $this->db->join('clientes as c', 'pc.idCliente = c.idCliente','INNER');
	// 	// $this->db->join('processos_advogados as pa','pa.idProcesso = p.idProcesso', 'INNER');
	// 	// $this->db->join('advogados as a','pa.idAdvogado = a.idAdvogado', 'INNER');
	// 	// $this->db->join('processos_outra_parte as po',' p.idProcesso = po.idProcesso','INNER');
	// 	// $this->db->group_by('p.idProcesso');
	// 	$this->db->order_by('data_abertura');

	// 	return $this->db->get()->result();
	// }


	public function processos_lista_pag($limite, $offset){
	    $this->db->limit($limite, $offset);
	    //Recebendo os dados dos processos
		//$data['processos'] = $this->db->get('processos')->result();
		//Criando querys SQL com JOIN usando active record
		$this->db->select(' idProcesso, numero_processo, tipo_de_acao, data_abertura');
		$this->db->from('processos');
		$this->db->order_by('data_abertura DESC');
	
		return $this->db->get()->result();
	}

	public function processos_lista_inicio(){
		$this->db->select(' idProcesso, numero_processo, tipo_de_acao, data_abertura');
		$this->db->limit(5);
		$this->db->from('processos');
		$this->db->order_by('data_abertura desc');
		return $this->db->get()->result();
	}


	public function contar_itens_processo_by_id($id){
		$this->db->select('count(*) as total');
		$this->db->from('processos');
		$this->db->where('idProcesso', $id);
		return $this->db->get()->result();
	}

	function carrega($idProcesso) {
		$query = $this->db->query("SELECT * FROM processos WHERE idProcesso='".$idProcesso."'");

		return $query->result();
	}

	public function listar_processos(){
		return $this->db->get('processos')->result();
	}

	// public function processos_lista(){
	// 	//$query = $this->db->query("SELECT numero_processo, c.nome_cliente, ")
	//     $this->db->select(" idProcesso, numero_processo, c.nome_cliente, a.nome_advogado, tipo_de_acao, data_abertura ");
	//     $this->db->from('processos as p');
	//     $this->db->join('clientes as c', 'c.idCliente = p.idClienteProcesso', 'INNER');
	//     $this->db->join('advogados as a', 'a.idAdvogado = p.idAdvogadoUm','INNER');
	//     $result = $this->db->get();
	//     return $result;
	// 	//return $this->db->get('processos')->result();
	// }

	//public function Listar processos pro clientes, advogados

	public function id_processo_cadastrar_cliente($id){
		$this->db->where('idProcesso', $id);
		$processos = $this->db->get('processos')->result();
		if(count($processos)==1) {
			foreach ($processos as $processo) {
				$this->idProcesso = $processo->idProcesso;
			}
			$dados['processos'] = $this;
		} else {
			$dados['processos'] = null;
		}
		return $dados;
	}

	public function detalhes_processo_by_id($id){
		$this->db->where('idProcesso', $id);
		$processos = $this->db->get('processos')->result();
		if (count($processos)==1) {
			foreach($processos as $processo) {
				$this->idProcesso = $processo->idProcesso;
				$this->numero_processo = $processo->numero_processo;
				$this->data_abertura = $processo->data_abertura;	
				$this->situacao_cliente = $processo->situacao_cliente;	
				$this->tipo_de_acao = $processo->tipo_de_acao;

				//UPLOAD DOS DOCUMENTOS 

				$this->valor_causa = $processo->valor_causa;
				$this->custas = $processo->custas;
				$this->honorarios = $processo->honorarios;
				$this->outras_despesas = $processo->outras_despesas;

				$this->relato_fatos = $processo->relato_fatos;
				$this->situacao_conjugal = $processo->situacao_conjugal;
				$this->casado_regime = $processo->casado_regime;
				$this->possui_filhos_menores = $processo->possui_filhos_menores;
				$this->quantos_puberes = $processo->quantos_puberes;
				$this->quantos_impuberes = $processo->quantos_impuberes;
				$this->quantos_maiores = $processo->quantos_maiores;
				$this->possui_bens = $processo->possui_bens;
				$this->quais = $processo->quais;
				$this->pretende_pensao_alimenticia = $processo->pretende_pensao_alimenticia;
				$this->para_si = $processo->para_si;
				$this->para_os_filhos = $processo->para_os_filhos;
				$this->renda_alimentante = $processo->renda_alimentante;
				$this->observacoes = $processo->observacoes;

			}
			$dados['processos'] = $this;
			//ACRESCENTAR PROCESSOS POR CLIENTE, ADVOGADO...
		} else {
			$dados['processos'] = null;
		}
		return $dados;
	}

	

	function adicionar( $numero_processo, $data_abertura, $situacao_cliente, $tipo_de_acao,  $relato_fatos, $valor_causa, $custas, $honorarios, $outras_despesas, $situacao_conjugal, $casado_regime, $possui_filhos_menores, $quantos_puberes, $quantos_impuberes, $quantos_maiores, $possui_bens, $quais, $pretende_pensao_alimenticia, $para_si, $para_os_filhos, $renda_alimentante, $observacoes) {
			

				//$this->idProcesso = $idProcesso;
				$this->numero_processo = $numero_processo;
				$this->data_abertura = $data_abertura;	
				$this->situacao_cliente = $situacao_cliente;
				$this->tipo_de_acao = $tipo_de_acao;

				$this->relato_fatos = $relato_fatos;
				$this->valor_causa = $valor_causa;
				$this->custas = $custas;
				$this->honorarios = $honorarios;
				$this->outras_despesas = $outras_despesas;
				$this->situacao_conjugal = $situacao_conjugal;
				$this->casado_regime = $casado_regime;
				$this->possui_filhos_menores = $possui_filhos_menores;
				$this->quantos_puberes = $quantos_puberes;
				$this->quantos_impuberes = $quantos_impuberes;
				$this->quantos_maiores = $quantos_maiores;
				$this->possui_bens = $possui_bens;
				$this->quais = $quais;
				$this->pretende_pensao_alimenticia = $pretende_pensao_alimenticia;
				$this->para_si = $para_si;
				$this->para_os_filhos = $para_os_filhos;
				$this->renda_alimentante = $renda_alimentante;
				$this->observacoes = $observacoes;
				return $this->db->insert('processos',$this);
		}

		function excluir($idProcesso){
			$this->db->where('idProcesso', $idProcesso);
			return $this->db->delete('processos');
		}

	// public function listar_id_processos_clientes($id){
	// 	$this->db->select('idProcesso');
	// 	$this->db->from('processos');
	// 	$this->db->where('idProcesso', $id);
	// 	return $this->db->get()->result();
	// }

		// $query = $this->db->query("SELECT idProcesso_Advogado, pa.idAdvogado, a.nome_advogado, idProcesso FROM processos_advogados as pa  inner join advogados as a on a.idAdvogado = pa.idAdvogado where idProcesso = '".$id."'");
		// return $query->result();



		public function pesquisar_processos_entre_datas($dataOne, $dataTwo){
			$query = $this->db->query("SELECT * from processos WHERE data_abertura between " . $dataOne . " and " . $dataTwo . " order by data_abertura");
			return $query->result();

			// $this->db->select('*');
			// $this->db->from('processos');
			// $this->db->where('data_abertura >=', $dataOne);
			// $this->db->where('data_abertura <=', $dataTwo);
			// $this->db->order_by('data_abertura');
			// return $this->db->get()->result();
		} 

		function get_processo($processo) {
			$this->db->where('idProcesso', $processo);
			$processos = $this->db->get('processos')->result();
			if (count($processos)==1) {
				foreach ($processos as $processo) {
					$this->idProcesso = $processo->idProcesso;
					$this->numero_processo = $processo->numero_processo;
					$this->data_abertura = $processo->data_abertura;	
					$this->situacao_cliente = $processo->situacao_cliente;
					$this->tipo_de_acao = $processo->tipo_de_acao;

					$this->relato_fatos = $processo->relato_fatos;
					$this->valor_causa = $processo->valor_causa;
					$this->custas = $processo->custas;
					$this->honorarios = $processo->honorarios;
					$this->outras_despesas = $processo->outras_despesas;
					$this->situacao_conjugal = $processo->situacao_conjugal;
					$this->casado_regime = $processo->casado_regime;
					$this->possui_filhos_menores = $processo->possui_filhos_menores;
					$this->quantos_puberes = $processo->quantos_puberes;
					$this->quantos_impuberes = $processo->quantos_impuberes;
					$this->quantos_maiores = $processo->quantos_maiores;
					$this->possui_bens = $processo->possui_bens;
					$this->quais = $processo->quais;
					$this->pretende_pensao_alimenticia = $processo->pretende_pensao_alimenticia;
					$this->para_si = $processo->para_si;
					$this->para_os_filhos = $processo->para_os_filhos;
					$this->renda_alimentante = $processo->renda_alimentante;
					$this->observacoes = $processo->observacoes;
				}
				return $this;
			}
		}

		// function gravar_alteracao($idProcesso, $_processo, $numero_processo, $data_abertura, $situacao_cliente, $idClienteProcesso, $idAdvogadoUm, $idAdvogadoDois, $tipo_de_acao, $nome_outra_parte, $email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade, $uf, $estado_civil, $nacionalidade, $profissao, $nome_testemunha_um, $email_testemunha_um, $telefone_testemunha_um, $endereco_testemunha_um, $numero_testemunha_um, $bairro_testemunha_um, $cep_testemunha_um, $cidade_testemunha_um, $uf_testemunha_um, $nome_testemunha_dois, $email_testemunha_dois, $telefone_testemunha_dois, $endereco_testemunha_dois, $numero_testemunha_dois, $bairro_testemunha_dois, $cep_testemunha_dois, $cidade_testemunha_dois, $uf_testemunha_dois,  $nome_testemunha_tres, $email_testemunha_tres, $telefone_testemunha_tres, $endereco_testemunha_tres, $numero_testemunha_tres, $bairro_testemunha_tres, $cep_testemunha_tres, $cidade_testemunha_tres, $uf_testemunha_tres, $relato_fatos, $situacao_conjugal, $casado_regime, $possui_filhos_menores, $quantos_puberes, $quantos_impuberes, $quantos_maiores, $possui_bens, $quais, $pretende_pensao_alimenticia, $para_si, $para_os_filhos, $renda_alimentante) {
		// 		$this->idProcesso = $idProcesso;
		// 		$this->slug_processo = $slug_processo;
		// 		$this->numero_processo = $numero_processo;
		// 		$this->data_abertura = $data_abertura;	
		// 		$this->situacao_cliente = $situacao_cliente;
		// 		$this->idClienteProcesso = $idClienteProcesso;	
		// 		$this->idAdvogadoUm = $idAdvogadoUm;		
		// 		$this->idAdvogadoDois = $idAdvogadoDois;	
		// 		$this->tipo_de_acao = $tipo_de_acao;
		// 		$this->nome_outra_parte = $nome_outra_parte;
		// 		$this->email = $email;	
		// 		$this->telefoneOne = $telefoneOne;
		// 		$this->telefoneTwo = $telefoneTwo;
		// 		$this->endereco = $endereco;	
		// 		$this->numero = $numero;
		// 		$this->bairro = $bairro;
		// 		$this->cep = $cep;	
		// 		$this->cidade = $cidade;	
		// 		$this->uf = $uf;		
		// 		$this->estado_civil = $estado_civil;	
		// 		$this->nacionalidade = $nacionalidade;	
		// 		$this->profissao = $profissao;
		// 		$this->nome_testemunha_um = $nome_testemunha_um;												
		// 		$this->email_testemunha_um = $email_testemunha_um;	
		// 		$this->telefone_testemunha_um = $telefone_testemunha_um;	
		// 		$this->endereco_testemunha_um = $endereco_testemunha_um;	
		// 		$this->numero_testemunha_um = $numero_testemunha_um;	
		// 		$this->bairro_testemunha_um = $bairro_testemunha_um;	
		// 		$this->cep_testemunha_um = $cep_testemunha_um;
		// 		$this->cidade_testemunha_um = $cidade_testemunha_um;
		// 		$this->uf_testemunha_um = $uf_testemunha_um;	

		// 		$this->nome_testemunha_dois = $nome_testemunha_dois;												
		// 		$this->email_testemunha_dois = $email_testemunha_dois;	
		// 		$this->telefone_testemunha_dois = $telefone_testemunha_dois;	
		// 		$this->endereco_testemunha_dois = $endereco_testemunha_dois;	
		// 		$this->numero_testemunha_dois = $numero_testemunha_dois;	
		// 		$this->bairro_testemunha_dois = $bairro_testemunha_dois;	
		// 		$this->cep_testemunha_dois = $cep_testemunha_dois;
		// 		$this->cidade_testemunha_dois = $cidade_testemunha_dois;
		// 		$this->uf_testemunha_dois = $uf_testemunha_dois;	

		// 		$this->nome_testemunha_tres = $nome_testemunha_tres;												
		// 		$this->email_testemunha_tres = $email_testemunha_tres;	
		// 		$this->telefone_testemunha_tres = $telefone_testemunha_tres;	
		// 		$this->endereco_testemunha_tres = $endereco_testemunha_tres;	
		// 		$this->numero_testemunha_tres = $numero_testemunha_tres;	
		// 		$this->bairro_testemunha_tres = $bairro_testemunha_tres;	
		// 		$this->cep_testemunha_tres = $cep_testemunha_tres;
		// 		$this->cidade_testemunha_tres = $cidade_testemunha_tres;
		// 		$this->uf_testemunha_tres = $uf_testemunha_tres;

		// 		//UPLOAD DOS DOCUMENTOS 

		// 		$this->relato_fatos = $relato_fatos;
		// 		$this->situacao_conjugal = $situacao_conjugal;
		// 		$this->casado_regime = $casado_regime;
		// 		$this->possui_filhos_menores = $possui_filhos_menores;
		// 		$this->quantos_puberes = $quantos_puberes;
		// 		$this->quantos_impuberes = $quantos_impuberes;
		// 		$this->quantos_maiores = $quantos_maiores;
		// 		$this->possui_bens = $possui_bens;
		// 		$this->quais = $quais;
		// 		$this->pretende_pensao_alimenticia = $pretende_pensao_alimenticia;
		// 		$this->para_si = $para_si;
		// 		$this->para_os_filhos = $para_os_filhos;
		// 		$this->renda_alimentante = $renda_alimentante;
		// 		$this->db->where('idProcesso', $this->idProcesso);
		// 		return $this->db->update('processos', $this);
		// }
}	