<?php
class Processos_model extends CI_Model {
	var $idProcesso;
	var $slug_processo;
	var $numero_processo;
	var $data_abertura;
	var $situacao_cliente;
	var $idCliente;
	var $idAdvogadoUm;
	var $idAdvogadoDois;
	var $tipo_de_acao;
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
	var $nome_testemunha_um;
	var $email_testemunha_um;
	var $telefone_testemunha_um;
	var $endereco_testemunha_um;
	var $numero_testemunha_um;
	var $bairro_testemunha_um;
	var $cep_testemunha_um;
	var $cidade_testemunha_um;
	var $uf_testemunha_um;
	var $nome_testemunha_dois;
	var $email_testemunha_dois;
	var $telefone_testemunha_dois;
	var $endereco_testemunha_dois;
	var $numero_testemunha_dois;
	var $bairro_testemunha_dois;
	var $cep_testemunha_dois;
	var $cidade_testemunha_dois;
	var $uf_testemunha_dois;
	var $nome_testemunha_tres;
	var $email_testemunha_tres;
	var $telefone_testemunha_tres;
	var $endereco_testemunha_tres;
	var $numero_testemunha_tres;
	var $bairro_testemunha_tres;
	var $cep_testemunha_tres;
	var $cidade_testemunha_tres;
	var $uf_testemunha_tres;

	//UPLOAD DOCUMENTOS

	var $relato_fatos;
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

	function __construct(){
		parent::__construct();
	}

	public function listar_processos(){
		return $this->db->get('processos')->result();
	}

	//public function Listar processos pro clientes, advogados

	public function detalhes_processo_by_slug($slug){
		$this->db->where('slug_processo', $slug);
		$processos = $this->db->get('processos')->result();
		if (count($processos)==1) {
			foreach($processos as $processo) {
				$this->idProcesso = $processo->idProcesso;
				$this->slug_processo = $processo->slug_processo;
				$this->numero_processo = $processo->numero_processo;
				$this->data_abertura = $processo->data_abertura;	
				$this->situacao_cliente = $processo->situacao_cliente;
				$this->idCliente = $processo->idCliente;	
				$this->idAdvogadoUm = $processo->idAdvogadoUm;		
				$this->idAdvogadoDois = $processo->idAdvogadoDois;	
				$this->tipo_de_acao = $processo->tipo_de_acao;
				$this->nome_outra_parte = $processo->nome_outra_parte;
				$this->email = $processo->email;	
				$this->telefoneOne = $processo->telefoneOne;
				$this->telefoneTwo = $processo->telefoneTwo;
				$this->endereco = $processo->endereco;	
				$this->numero = $processo->numero;
				$this->bairro = $processo->bairro;
				$this->cep = $processo->cep;	
				$this->cidade = $processo->cidade;	
				$this->uf = $processo->uf;		
				$this->estado_civil = $processo->estado_civil;	
				$this->nacionalidade = $processo->nacionalidade;	
				$this->profissao = $processo->profissao;
				$this->nome_testemunha_um = $processo->nome_testemunha_um;												}
				$this->email_testemunha_um = $processo->email_testemunha_um;	
				$this->telefone_testemunha_um = $processo->telefone_testemunha_um;	
				$this->endereco_testemunha_um = $processo->endereco_testemunha_um;	
				$this->numero_testemunha_um = $processo->numero_testemunha_um;	
				$this->bairro_testemunha_um = $processo->bairro_testemunha_um;	
				$this->cep_testemunha_um = $processo->cep_testemunha_um;
				$this->cidade_testemunha_um = $processo->cidade_testemunha_um;
				$this->uf_testemunha_um = $processo->uf_testemunha_um;	

				$this->nome_testemunha_dois = $processo->nome_testemunha_dois;												}
				$this->email_testemunha_dois = $processo->email_testemunha_dois;	
				$this->telefone_testemunha_dois = $processo->telefone_testemunha_dois;	
				$this->endereco_testemunha_dois = $processo->endereco_testemunha_dois;	
				$this->numero_testemunha_dois = $processo->numero_testemunha_dois;	
				$this->bairro_testemunha_dois = $processo->bairro_testemunha_dois;	
				$this->cep_testemunha_dois = $processo->cep_testemunha_dois;
				$this->cidade_testemunha_dois = $processo->cidade_testemunha_dois;
				$this->uf_testemunha_dois = $processo->uf_testemunha_dois;	

				$this->nome_testemunha_tres = $processo->nome_testemunha_tres;												}
				$this->email_testemunha_tres = $processo->email_testemunha_tres;	
				$this->telefone_testemunha_tres = $processo->telefone_testemunha_tres;	
				$this->endereco_testemunha_tres = $processo->endereco_testemunha_tres;	
				$this->numero_testemunha_tres = $processo->numero_testemunha_tres;	
				$this->bairro_testemunha_tres = $processo->bairro_testemunha_tres;	
				$this->cep_testemunha_tres = $processo->cep_testemunha_tres;
				$this->cidade_testemunha_tres = $processo->cidade_testemunha_tres;
				$this->uf_testemunha_tres = $processo->uf_testemunha_tres;

				//UPLOAD DOS DOCUMENTOS 

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
			}
			$dados['processos'] = $this;
			//ACRESCENTAR PROCESSOS POR CLIENTE, ADVOGADO...
		} else {
			$dados['processos'] = null;
		}
		return $dados;
	}

	function adicionar($slug_processo, $numero_processo, $data_abertura, $situacao_cliente, $idCliente, $idAdvogadoUm, $idAdvogadoDois, $tipo_de_acao, $nome_outra_parte, $email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade, $uf, $estado_civil, $nacionalidade, $profissao, $nome_testemunha_um, $email_testemunha_um, $telefone_testemunha_um, $endereco_testemunha_um, $numero_testemunha_um, $bairro_testemunha_um, $cep_testemunha_um, $cidade_testemunha_um, $uf_testemunha_um, $nome_testemunha_dois, $email_testemunha_dois, $telefone_testemunha_dois, $endereco_testemunha_dois, $numero_testemunha_dois, $bairro_testemunha_dois, $cep_testemunha_dois, $cidade_testemunha_dois, $uf_testemunha_dois,  $nome_testemunha_tres, $email_testemunha_tres, $telefone_testemunha_tres, $endereco_testemunha_tres, $numero_testemunha_tres, $bairro_testemunha_tres, $cep_testemunha_tres, $cidade_testemunha_tres, $uf_testemunha_tres, $relato_fatos, $situacao_conjugal, $casado_regime, $possui_filhos_menores, $quantos_puberes, $quantos_impuberes, $quantos_maiores, $possui_bens, $quais, $pretende_pensao_alimenticia, $para_si, $para_os_filhos, $renda_alimentante) {
			

				//$this->idProcesso = $idProcesso;
				$this->slug_processo = $slug_processo;
				$this->numero_processo = $numero_processo;
				$this->data_abertura = $data_abertura;	
				$this->situacao_cliente = $situacao_cliente;
				$this->idCliente = $idCliente;	
				$this->idAdvogadoUm = $idAdvogadoUm;		
				$this->idAdvogadoDois = $idAdvogadoDois;	
				$this->tipo_de_acao = $tipo_de_acao;
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
				$this->nome_testemunha_um = $nome_testemunha_um;												}
				$this->email_testemunha_um = $email_testemunha_um;	
				$this->telefone_testemunha_um = $telefone_testemunha_um;	
				$this->endereco_testemunha_um = $endereco_testemunha_um;	
				$this->numero_testemunha_um = $numero_testemunha_um;	
				$this->bairro_testemunha_um = $bairro_testemunha_um;	
				$this->cep_testemunha_um = $cep_testemunha_um;
				$this->cidade_testemunha_um = $cidade_testemunha_um;
				$this->uf_testemunha_um = $uf_testemunha_um;	

				$this->nome_testemunha_dois = $nome_testemunha_dois;												}
				$this->email_testemunha_dois = $email_testemunha_dois;	
				$this->telefone_testemunha_dois = $telefone_testemunha_dois;	
				$this->endereco_testemunha_dois = $endereco_testemunha_dois;	
				$this->numero_testemunha_dois = $numero_testemunha_dois;	
				$this->bairro_testemunha_dois = $bairro_testemunha_dois;	
				$this->cep_testemunha_dois = $cep_testemunha_dois;
				$this->cidade_testemunha_dois = $cidade_testemunha_dois;
				$this->uf_testemunha_dois = $uf_testemunha_dois;	

				$this->nome_testemunha_tres = $nome_testemunha_tres;												}
				$this->email_testemunha_tres = $email_testemunha_tres;	
				$this->telefone_testemunha_tres = $telefone_testemunha_tres;	
				$this->endereco_testemunha_tres = $endereco_testemunha_tres;	
				$this->numero_testemunha_tres = $numero_testemunha_tres;	
				$this->bairro_testemunha_tres = $bairro_testemunha_tres;	
				$this->cep_testemunha_tres = $cep_testemunha_tres;
				$this->cidade_testemunha_tres = $cidade_testemunha_tres;
				$this->uf_testemunha_tres = $uf_testemunha_tres;

				//UPLOAD DOS DOCUMENTOS 

				$this->relato_fatos = $relato_fatos;
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
				return $this->db->insert('processos',$this);
		}

		function excluir($idProcesso){
			$this->db->where('idProcesso', $idProcesso);
			return $this->db->delete('processos');
		}

		function get_processo($processo) {
			$this->db->where('idProcesso', $processo);
			$processos = $this->db->get('processos')->result();
			if (count($processos)==1) {
				foreach ($processos as $processo) {
					$this->idProcesso = $processo->idProcesso;
					$this->slug_processo = $processo->slug_processo;
					$this->numero_processo = $processo->numero_processo;
					$this->data_abertura = $processo->data_abertura;	
					$this->situacao_cliente = $processo->situacao_cliente;
					$this->idCliente = $processo->idCliente;	
					$this->idAdvogadoUm = $processo->idAdvogadoUm;		
					$this->idAdvogadoDois = $processo->idAdvogadoDois;	
					$this->tipo_de_acao = $processo->tipo_de_acao;
					$this->nome_outra_parte = $processo->nome_outra_parte;
					$this->email = $processo->email;	
					$this->telefoneOne = $processo->telefoneOne;
					$this->telefoneTwo = $processo->telefoneTwo;
					$this->endereco = $processo->endereco;	
					$this->numero = $processo->numero;
					$this->bairro = $processo->bairro;
					$this->cep = $processo->cep;	
					$this->cidade = $processo->cidade;	
					$this->uf = $processo->uf;		
					$this->estado_civil = $processo->estado_civil;	
					$this->nacionalidade = $processo->nacionalidade;	
					$this->profissao = $processo->profissao;
					$this->nome_testemunha_um = $processo->nome_testemunha_um;												}
					$this->email_testemunha_um = $processo->email_testemunha_um;	
					$this->telefone_testemunha_um = $processo->telefone_testemunha_um;	
					$this->endereco_testemunha_um = $processo->endereco_testemunha_um;	
					$this->numero_testemunha_um = $processo->numero_testemunha_um;	
					$this->bairro_testemunha_um = $processo->bairro_testemunha_um;	
					$this->cep_testemunha_um = $processo->cep_testemunha_um;
					$this->cidade_testemunha_um = $processo->cidade_testemunha_um;
					$this->uf_testemunha_um = $processo->uf_testemunha_um;	

					$this->nome_testemunha_dois = $processo->nome_testemunha_dois;												}
					$this->email_testemunha_dois = $processo->email_testemunha_dois;	
					$this->telefone_testemunha_dois = $processo->telefone_testemunha_dois;	
					$this->endereco_testemunha_dois = $processo->endereco_testemunha_dois;	
					$this->numero_testemunha_dois = $processo->numero_testemunha_dois;	
					$this->bairro_testemunha_dois = $processo->bairro_testemunha_dois;	
					$this->cep_testemunha_dois = $processo->cep_testemunha_dois;
					$this->cidade_testemunha_dois = $processo->cidade_testemunha_dois;
					$this->uf_testemunha_dois = $processo->uf_testemunha_dois;	

					$this->nome_testemunha_tres = $processo->nome_testemunha_tres;												}
					$this->email_testemunha_tres = $processo->email_testemunha_tres;	
					$this->telefone_testemunha_tres = $processo->telefone_testemunha_tres;	
					$this->endereco_testemunha_tres = $processo->endereco_testemunha_tres;	
					$this->numero_testemunha_tres = $processo->numero_testemunha_tres;	
					$this->bairro_testemunha_tres = $processo->bairro_testemunha_tres;	
					$this->cep_testemunha_tres = $processo->cep_testemunha_tres;
					$this->cidade_testemunha_tres = $processo->cidade_testemunha_tres;
					$this->uf_testemunha_tres = $processo->uf_testemunha_tres;

					//UPLOAD DOS DOCUMENTOS 

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
				}
				return $this;
			}
		}

		function gravar_alteracao($idProcesso, $slug_processo, $numero_processo, $data_abertura, $situacao_cliente, $idCliente, $idAdvogadoUm, $idAdvogadoDois, $tipo_de_acao, $nome_outra_parte, $email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade, $uf, $estado_civil, $nacionalidade, $profissao, $nome_testemunha_um, $email_testemunha_um, $telefone_testemunha_um, $endereco_testemunha_um, $numero_testemunha_um, $bairro_testemunha_um, $cep_testemunha_um, $cidade_testemunha_um, $uf_testemunha_um, $nome_testemunha_dois, $email_testemunha_dois, $telefone_testemunha_dois, $endereco_testemunha_dois, $numero_testemunha_dois, $bairro_testemunha_dois, $cep_testemunha_dois, $cidade_testemunha_dois, $uf_testemunha_dois,  $nome_testemunha_tres, $email_testemunha_tres, $telefone_testemunha_tres, $endereco_testemunha_tres, $numero_testemunha_tres, $bairro_testemunha_tres, $cep_testemunha_tres, $cidade_testemunha_tres, $uf_testemunha_tres, $relato_fatos, $situacao_conjugal, $casado_regime, $possui_filhos_menores, $quantos_puberes, $quantos_impuberes, $quantos_maiores, $possui_bens, $quais, $pretende_pensao_alimenticia, $para_si, $para_os_filhos, $renda_alimentante) {
			//$this->idProcesso = $idProcesso;
				$this->slug_processo = $slug_processo;
				$this->numero_processo = $numero_processo;
				$this->data_abertura = $data_abertura;	
				$this->situacao_cliente = $situacao_cliente;
				$this->idCliente = $idCliente;	
				$this->idAdvogadoUm = $idAdvogadoUm;		
				$this->idAdvogadoDois = $idAdvogadoDois;	
				$this->tipo_de_acao = $tipo_de_acao;
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
				$this->nome_testemunha_um = $nome_testemunha_um;												}
				$this->email_testemunha_um = $email_testemunha_um;	
				$this->telefone_testemunha_um = $telefone_testemunha_um;	
				$this->endereco_testemunha_um = $endereco_testemunha_um;	
				$this->numero_testemunha_um = $numero_testemunha_um;	
				$this->bairro_testemunha_um = $bairro_testemunha_um;	
				$this->cep_testemunha_um = $cep_testemunha_um;
				$this->cidade_testemunha_um = $cidade_testemunha_um;
				$this->uf_testemunha_um = $uf_testemunha_um;	

				$this->nome_testemunha_dois = $nome_testemunha_dois;												}
				$this->email_testemunha_dois = $email_testemunha_dois;	
				$this->telefone_testemunha_dois = $telefone_testemunha_dois;	
				$this->endereco_testemunha_dois = $endereco_testemunha_dois;	
				$this->numero_testemunha_dois = $numero_testemunha_dois;	
				$this->bairro_testemunha_dois = $bairro_testemunha_dois;	
				$this->cep_testemunha_dois = $cep_testemunha_dois;
				$this->cidade_testemunha_dois = $cidade_testemunha_dois;
				$this->uf_testemunha_dois = $uf_testemunha_dois;	

				$this->nome_testemunha_tres = $nome_testemunha_tres;												}
				$this->email_testemunha_tres = $email_testemunha_tres;	
				$this->telefone_testemunha_tres = $telefone_testemunha_tres;	
				$this->endereco_testemunha_tres = $endereco_testemunha_tres;	
				$this->numero_testemunha_tres = $numero_testemunha_tres;	
				$this->bairro_testemunha_tres = $bairro_testemunha_tres;	
				$this->cep_testemunha_tres = $cep_testemunha_tres;
				$this->cidade_testemunha_tres = $cidade_testemunha_tres;
				$this->uf_testemunha_tres = $uf_testemunha_tres;

				//UPLOAD DOS DOCUMENTOS 

				$this->relato_fatos = $relato_fatos;
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
				$this->db->where('idProcesso', $this->idProcesso);
				return $this->db->update('processos', $this);
		}
}	