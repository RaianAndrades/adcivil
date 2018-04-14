<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if(!$this->session->userdata('session_id')
		// 	|| !$this->session->userdata('logado')) {
		// 	redirect(base_url('admin/home'));
		// }
		if($this->session->userdata('logged_in')){
			//redirect(base_url('admin/home'));
		$this->load->model('processos_model','processos');
		$this->load->model('clientes_model','clientes');
		$this->load->model('advogados_model','advogados');
		$this->load->model('processos_clientes_model', 'processos_clientes');
		$this->load->model('processos_advogados_model', 'processos_advogados');
		$this->load->model('processos_outra_parte_model', 'processos_outra_parte');
		$this->load->model('processos_testemunhas_model', 'processos_testemunhas');
		$this->load->model('processos_audiencias_model', 'processos_audiencias');
		$this->load->model('processos_documentos_model', 'processos_documentos');
		$this->load->model('processos_honorarios_model', 'processos_honorarios');
		$this->load->helper('form');
		$this->load->library('table');
	} else {
		redirect(base_url('login'));
	}


			// $dadosProcesso = array(
			// 	'logged_in' => TRUE,
			// 	'idProcesso' => $idProcesso
			// ); 

			//$this->session->set_userdata($dadosProcesso);
	}


	//pagina inicial 
	public function index($offset=0){
		$limite = 5;
		$dados['clientes']  = $this->clientes->listar_clientes();
		$dados['advogados'] = $this->advogados->listar_advogados();
		$dados['processos'] = $this->processos->processos_lista_pag($limite, $offset);
		$dados['processosEditar'] = $this->processos->listar_processos();
		$dados['processosClientes'] = $this->processos->listar_processos();
		//$dados['processos'] = $this->processos->processos_lista();
		$this->load->library('pagination');

		$config['base_url'] = base_url()."admin/processos/index/";
		$config['per_page'] = $limite;
		$config['total_rows'] = $this->db->get('processos')->num_rows();
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';

		$this->pagination->initialize($config);
		$dados['paginacao'] = $this->pagination->create_links();

		$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');
		$this->load->view('admin/processos_dois', $dados);
		$this->load->view('admin/html_footer');
	}

	//abre pagina para cadastrar processo
	public function cadastrar_processo(){
		$this->load->view('admin/cadastrar_processo');
	}


	//abre as informações do processo escolhido
	public function ver($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else {
		$this->load->helper('text');
		$dados['processos_advogados'] = $this->processos_advogados->processos_lista_advogados($id);
		$dados['processos_clientes'] = $this->processos_clientes->processos_lista_clientes($id);
		$dados['processos_testemunhas'] = $this->processos_testemunhas->processos_lista_testemunhas($id);
		$dados['processos_outra_parte'] = $this->processos_outra_parte->processos_lista_outra_parte($id);
		$dados['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias($id);

		$dados['processos'] = $this->processos->detalhes_processo_by_id($id);
		$this->load->view('admin/ver_processo', $dados);
		}
	}

	//pesquisa sobre os dados digitados 
	public function buscar(){
		$data['processos'] = $this->processos->processos_lista();
		$busca = $this->input->post('busca');
		$data2['busca'] = $busca;
		$this->db->like('nome_cliente',$busca);
		$this->db->or_like('nome_advogado',$busca);
		//$this->db->or_like('numero_processo', $busca);
		$this->db->or_like('nome_testemunha', $busca);
		$this->db->or_like('nome_outra_parte', $busca);

		$data2['processos'] = $this->processos->processos_lista();
		$this->load->view('admin/resultado_busca_processo', $data2);
	}

	// public function buscar(){
	// 	$data['processos'] = $this->processos->processos_lista($busca);
	// 	$busca = $this->input->post('busca');
	// 	$data2['busca'] = $busca;
		

	// 	$data2['processos'] = $this->processos->processos_lista();
	// 	$this->load->view('admin/resultado_busca_processo', $data2);
	// }

	
		

	//adiciona um novo processo
	function adicionar(){
		$numero_processo   = $this->input->post('numero_processo');
		$data_abertura   = $this->input->post('data_abertura');
		$situacao_cliente = $this->input->post('situacao_cliente');
		$tipo_de_acao   = $this->input->post('tipo_de_acao');
		
		//UPLOAD DOS DOCUMENTOS 
		$relato_fatos = $this->input->post('relato_fatos');
		$valor_causa = str_replace(".","");
		$valor_causa = str_replace(",",".");
		$valor_causa = $this->input->post('valor_causa');
		$custas = $this->input->post('custas');
		$honorarios = $this->input->post('honorarios');
		$outras_despesas = $this->input->post('outras_despesas');
		$situacao_conjugal = $this->input->post('situacao_conjugal');
		$casado_regime = $this->input->post('casado_regime');
		$possui_filhos_menores = $this->input->post('possui_filhos_menores');
		$quantos_puberes = $this->input->post('quantos_puberes');
		$quantos_impuberes = $this->input->post('quantos_impuberes');
		$quantos_maiores = $this->input->post('quantos_maiores');
		$possui_bens = $this->input->post('possui_bens');
		$quais = $this->input->post('quais');
		$pretende_pensao_alimenticia = $this->input->post('pretende_pensao_alimenticia');
		$para_si = $this->input->post('para_si');
		$para_os_filhos = $this->input->post('para_os_filhos');
		$renda_alimentante = $this->input->post('renda_alimentante');
		$observacoes = $this->input->post('observacoes');

		if ($this->processos->adicionar($numero_processo, $data_abertura, $situacao_cliente, $tipo_de_acao, $relato_fatos, $valor_causa, $custas, $honorarios, $outras_despesas, $situacao_conjugal, $casado_regime, $possui_filhos_menores, $quantos_puberes, $quantos_impuberes, $quantos_maiores, $possui_bens, $quais, $pretende_pensao_alimenticia, $para_si, $para_os_filhos, $renda_alimentante, $observacoes)) {
			redirect(base_url('admin/processos'));
		} else {
			die ("Não foi possivel adicionar o processo.");
		}
	}

	//adiciona um novo cliente a um processo
	function adicionar_cliente(){
		// $this->load->view('admin/processos_clientes');
		//$idProcesso = $id;
		$idProcesso = $this->input->post('idProcesso');
		$idCliente = $this->input->post('idCliente');
			if ($this->processos_clientes->adicionar_cliente($idProcesso, $idCliente)) {
			redirect(base_url('admin/processos/cadastrar_processo_cliente/' . $idProcesso));
		} else {
			die ("Não foi possivel adicionar o cliente ao processo.");
		}
	}

	//adiciona um novo advogado a um processo
	function adicionar_advogado(){
		$idProcesso = $this->input->post('idProcesso');
		$idAdvogado = $this->input->post('idAdvogado');
				if ($this->processos_advogados->adicionar_advogado($idProcesso, $idAdvogado)) {
			redirect(base_url('admin/processos/cadastrar_processo_advogado/' . $idProcesso));
		} else {
			die ("Não foi possivel adicionar o advogado ao processo.");
		}
	}

	 // 	

	// function adicionar_outra_parte(){
	// 	//$idProcesso_Outra_Parte = $this->input->post('idProcesso_Outra_Parte');
	// 	$idProcesso = $this->input->post('idProcesso');
	// 	$nome_outra_parte = $this->input->post('nome_outra_parte');
	// 	$email = $this->input->post('email');
	// 	$telefoneOne = $this->input->post('telefoneOne');
	// 	$telefoneTwo = $this->input->post('telefoneTwo');
	// 	$endereco = $this->input->post('endereco');
	// 	$numero = $this->input->post('numero');
	// 	$bairro = $this->input->post('bairro');
	// 	$cep = $this->input->post('cep');
	// 	$cidade = $this->input->post('cidade');
	// 	$uf = $this->input->post('uf');
	// 	$estado_civil = $this->input->post('estado_civil');
	// 	$nacionalidade = $this->input->post('nacionalidade');
	// 	$profissao = $this->input->post('profissao');
	// 	if ($this->processos_outra_parte->adicionar_outra_parte($idProcesso, $nome_outra_parte,
	// 		$email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade,
	// 		$uf, $estado_civil, $nacionalidade, $profissao)) {
	// 		redirect(base_url('admin/processos/cadastrar_processo_outra_parte/' . $idProcesso));
	// 	} else {
	// 		die ("Não foi possivel adicionar o advogado ao processo.");
	// 	}
	// }

	//excluir um processo
	function excluir($idProcesso) {
		if(!isset($idProcesso)){
					redirect(base_url('admin/processos'));
				} else
		if ($this->processos->excluir($idProcesso)){
			redirect(base_url('admin/processos'));
		}
		else {
			die ("Esse processo não pode ser excluido, verifique se não existem clientes, advogados, 
				outras partes, testemunhas, audiências, documentos ou honorários cadastrados.");
		}
	}

	// function excluir($idProcesso) {
	// 	//if ($this->processos->excluir($idProcesso)){
	// 	$result = $this->processos->excluir($idProcesso);
	// 	if($result){
	// 		$data['info'] = 'Processo excluído com sucesso!.';
	// 	 		redirect(base_url('admin/processos', $data));
	// 	}
	// 	else {
	//  		$data['info'] = 'Esse processo não pode ser excluido, verifique se não existem clientes, advogados, 
	//  			outras partes, testemunhas, audiências, documentos ou honorários cadastrados.';
	//  		redirect(base_url('admin/processos', $data));	
	//  	}
	// }

	//identifica o id do processo para cadastrar novo cliente
	function cadastrar_processo_cliente($id){

		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		$dados['processos_clientes'] = $this->processos_clientes->processos_lista_clientes($id);

		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/processos_clientes', $dados);
		}
	}

	//identifica o id do processo para cadastrar novo cliente
	function cadastrar_processo_documento($id){

		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		$dados['processos_documentos'] = $this->processos_documentos->processos_lista_documentos($id);

		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/form_upload', $dados);
		}
	}

	//identifica o id do processo para cadastrar novo advogado
	function cadastrar_processo_advogado($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		$dados['processos_advogados'] = $this->processos_advogados->processos_lista_advogados($id);
		
		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/processos_advogados', $dados);
		}
	}

	function cadastrar_processo_outra_parte($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		$dados['processos_outra_parte'] = $this->processos_outra_parte->processos_lista_outra_parte($id);

		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/processos_outra_parte', $dados);
		}
	}

	function cadastrar_processo_testemunha($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		$dados['processos_testemunhas'] = $this->processos_testemunhas->processos_lista_testemunhas($id);
		
		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/processos_testemunhas', $dados);
		}
	}	

	function cadastrar_processo_audiencia($id){
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		$dados['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias($id);

		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/processos_audiencias', $dados);
		}
	}

	//identifica o id do processo para cadastrar novo pagamento de honorário
	function cadastrar_processo_honorario($id){
			if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 

		$dados['processos_honorarios'] = $this->processos_honorarios->processos_lista_honorarios($id);
		$dados['processosHonorarios'] = $this->processos_honorarios->soma_honorarios($id);

		$this->db->where('idProcesso', $id);
		$dados['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/processos_honorarios', $dados);
		}
	}

	//editar processo
	function editar($id) {
		if(!isset($id)){
					redirect(base_url('admin/processos'));
				} else { 
		// $dados['getProcesso'] = $this->processos->get_processo($processo);
		 $dados['clientes'] = $this->clientes->listar_clientes();
		 $dados['advogados'] = $this->advogados->listar_advogados();
		$this->db->where('idProcesso', $id);
		$dados['processosEditar'] = $this->db->get('processos')->result();

		//$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');
		$this->load->view('admin/processos_editarDois', $dados);
		$this->load->view('admin/html_footer');
		// if ($this->processos->get_processo==NULL){
		// 	redirect(base_url('admin/processos'));
		// }
		}
	}

	//grava as alterações no banco
	function gravar_alteracao() {
		$id = $this->input->post('idProcesso');

		$data['idProcesso']  = $this->input->post('idProcesso');
		$data['numero_processo']   = $this->input->post('numero_processo');
		$data['data_abertura']   = $this->input->post('data_abertura');
		$data['situacao_cliente'] = $this->input->post('situacao_cliente');
		$data['tipo_de_acao']   = $this->input->post('tipo_de_acao');
		
		//UPLOAD DOS DOCUMENTOS 
		$data['relato_fatos'] = $this->input->post('relato_fatos');
		$data['valor_causa'] = $this->input->post('valor_causa');
		$data['custas'] = $this->input->post('custas');
		$data['honorarios'] = $this->input->post('honorarios');
		$data['outras_despesas'] = $this->input->post('outras_despesas');
		$data['situacao_conjugal'] = $this->input->post('situacao_conjugal');
		$data['casado_regime'] = $this->input->post('casado_regime');
		$data['possui_filhos_menores'] = $this->input->post('possui_filhos_menores');
		$data['quantos_puberes'] = $this->input->post('quantos_puberes');
		$data['quantos_impuberes'] = $this->input->post('quantos_impuberes');
		$data['quantos_maiores'] = $this->input->post('quantos_maiores');
		$data['possui_bens'] = $this->input->post('possui_bens');
		$data['quais'] = $this->input->post('quais');
		$data['pretende_pensao_alimenticia'] = $this->input->post('pretende_pensao_alimenticia');
		$data['para_si'] = $this->input->post('para_si');
		$data['para_os_filhos'] = $this->input->post('para_os_filhos');
		$data['renda_alimentante'] = $this->input->post('renda_alimentante');
		$data['observacoes'] = $this->input->post('observacoes');

		$this->db->where('idProcesso', $id);
		$this->db->update('processos', $data);
		// if ($this->processos->gravar_alteracao($idProcesso, $slug_processo, $numero_processo, $data_abertura, $situacao_cliente, $idClienteProcesso, $idAdvogadoUm, $idAdvogadoDois, $tipo_de_acao, $nome_outra_parte, $email, $telefoneOne, $telefoneTwo, $endereco, $numero, $bairro, $cep, $cidade, $uf, $estado_civil, $nacionalidade, $profissao, $nome_testemunha_um, $email_testemunha_um, $telefone_testemunha_um, $endereco_testemunha_um, $numero_testemunha_um, $bairro_testemunha_um, $cep_testemunha_um, $cidade_testemunha_um, $uf_testemunha_um, $nome_testemunha_dois, $email_testemunha_dois, $telefone_testemunha_dois, $endereco_testemunha_dois, $numero_testemunha_dois, $bairro_testemunha_dois, $cep_testemunha_dois, $cidade_testemunha_dois, $uf_testemunha_dois,  $nome_testemunha_tres, $email_testemunha_tres, $telefone_testemunha_tres, $endereco_testemunha_tres, $numero_testemunha_tres, $bairro_testemunha_tres, $cep_testemunha_tres, $cidade_testemunha_tres, $uf_testemunha_tres, $relato_fatos, $situacao_conjugal, $casado_regime, $possui_filhos_menores, $quantos_puberes, $quantos_impuberes, $quantos_maiores, $possui_bens, $quais, $pretende_pensao_alimenticia, $para_si, $para_os_filhos, $renda_alimentante)) {
			redirect(base_url('admin/processos'));
		// } else {
		// 	die ("Não foi possivel adicionar o processo.");
		// }
	}
}