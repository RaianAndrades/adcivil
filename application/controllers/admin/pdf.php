<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
		$this->load->model('pdf_model','pdf');
		$this->load->model('clientes_model','clientes');
		$this->load->model('advogados_model','advogados');
		$this->load->model('processos_model','processos');
		$this->load->model('processos_clientes_model','processos_clientes');
		$this->load->model('processos_advogados_model','processos_advogados');
		$this->load->model('processos_testemunhas_model','processos_testemunhas');
		$this->load->model('processos_outra_parte_model','processos_outra_parte');
		$this->load->model('processos_audiencias_model','processos_audiencias');
		
		//$this->load->model('clientes_model','clientes');
		$this->load->library('tcpdf');
	} else {
		redirect(base_url('login'));
	}
	}

	public function index () {
		$dados['advogados'] = $this->advogados->listar_advogados();
		$dados['clientes'] = $this->clientes->listar_clientes();
		$dados['processos'] = $this->processos->listar_processos_relatorios();
		$this->load->view('admin/relatorios', $dados);
	}

	public function clientes_Pdf(){
		$data['clientes'] = $this->pdf->listar_clientes();
		$this->load->vars($data);
		$this->load->view('admin/relatorio_cliente');
	}

	public function advogados_Pdf(){
		$data['advogados'] = $this->pdf->listar_advogados();
		$this->load->vars($data);
		$this->load->view('admin/relatorio_advogado');
	}

	public function processos_Pdf(){
		$data['processos'] = $this->pdf->processos_lista();
		$this->load->vars($data);
		$this->load->view('admin/relatorio_processo');
	}

	public function audiencias_Pdf(){
		$data['audiencias'] = $this->pdf->audiencias_lista();
		$this->load->vars($data);
		$this->load->view('admin/relatorio_audiencia');
	}

	 public function info_cliente($id){
	 	$this->load->helper('text');
	 	$dados['clientes'] = $this->pdf->info_cliente($id);

	 	$this->load->view('admin/info_cliente', $dados);
	 }

	public function buscar_advogado(){
		$data['advogados'] = $this->db->get('advogados')->result();
		$busca = $this->input->post('nome_adv');
		$data2['nome_adv'] = $busca;
		$this->db->where('nome_advogado', $busca);
		$this->db->order_by('nome_advogado');

		$data2['advogados'] = $this->db->get('advogados')->result();
		$this->load->view('admin/relatorio_advogado_buscar', $data2);
	}

	public function buscar_cliente(){
		$data['clientes'] = $this->db->get('clientes')->result();
		$busca = $this->input->post('nome_cli');
		$data2['nome_cli'] = $busca;
		$this->db->where('nome_cliente', $busca);
		$this->db->order_by('nome_cliente');

		$data2['clientes'] = $this->db->get('clientes')->result();
		$this->load->view('admin/relatorio_cliente_buscar', $data2);
	}

	public function buscar_processo(){
		$this->load->helper('text');

		$busca_test = $this->input->post('num_processo');
		$data2['processos_testemunhas'] = $this->processos_testemunhas->processos_lista_testemunhas_np($busca_test);
		$busca_cli = $this->input->post('num_processo');
		$data2['processos_clientes'] = $this->processos_clientes->processos_lista_clientes_np($busca_cli);
		$busca_adv = $this->input->post('num_processo');
		$data2['processos_advogados'] = $this->processos_advogados->processos_lista_advogados_np($busca_adv);
		$busca_outras = $this->input->post('num_processo');
		$data2['processos_outras_partes'] = $this->processos_outra_parte->processos_lista_outra_parte_np($busca_outras);
		$busca_audiencia = $this->input->post('num_processo');
		$data2['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias_np($busca_audiencia);

		$data['processos'] = $this->db->get('processos')->result();
		$busca = $this->input->post('num_processo');
		$data2['num_processo'] = $busca;
		$this->db->where('numero_processo', $busca);
		$this->db->order_by('numero_processo');

		$data2['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/relatorio_processo_buscar', $data2);
	}

		public function relatorio_processo($busca){
		$this->load->helper('text');

		//$busca_test = $this->input->post('num_processo');
		$data2['processos_testemunhas'] = $this->processos_testemunhas->processos_lista_testemunhas_id($busca);
		//$busca_cli = $this->input->post('num_processo');
		$data2['processos_clientes'] = $this->processos_clientes->processos_lista_clientes_id($busca);
		//$busca_adv = $this->input->post('num_processo');
		$data2['processos_advogados'] = $this->processos_advogados->processos_lista_advogados_id($busca);
		//$busca_outras = $this->input->post('num_processo');
		$data2['processos_outras_partes'] = $this->processos_outra_parte->processos_lista_outra_parte_id($busca);
		//$busca_audiencia = $this->input->post('num_processo');
		$data2['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias_id($busca);

		$data['processos'] = $this->db->get('processos')->result();
		//$busca = $this->input->post('num_processo');
		//$data2['num_processo'] = $busca;
		$this->db->where('idProcesso', $busca);
		$this->db->order_by('numero_processo');

		$data2['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/relatorio_processo_buscar', $data2);
	}

	public function buscar_audiencias(){
		$this->load->helper('text');

		$busca_audiencia = $this->input->post('num_processo');
		$data2['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias_np($busca_audiencia);

		$data['processos'] = $this->db->get('processos')->result();
		$busca = $this->input->post('num_processo');
		$data2['num_processo'] = $busca;
		$this->db->where('numero_processo', $busca);
		$this->db->order_by('numero_processo');

		$data2['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/relatorio_audiencia_buscar', $data2);
	}


	public function pesquisar_audiencias(){
		$this->load->helper('text');

		$dataOne = $this->input->post('dataOne');
		$dataTwo = $this->input->post('dataTwo');

		$data2['processos_audiencias'] = $this->processos_audiencias->pesquisar_audiencias_entre_datas($dataOne,$dataTwo);
		$this->db->where('data >=', $dataOne);
		$this->db->where('data <=', $dataTwo);
		$this->db->order_by('data');
		//$data['processos_audiencias'] = $this->db->get('processos_audiencias')->result();
		// $this->db->select('data, horario, vara, cidade');
		// $this->db->from('processos_audiencias');
		// $data1 = $this->input->post('dataOne');
		// $data2 = $this->input->post('dataTwo');
		// $this->db->where('data >=', $data1);
		// $this->db->where('data <=', $data2);
		// $this->db->order_by('data');

		//$data3['processos_audiencias'] = $this->db->get('processos_audiencias')->result();
		$data2['processos_audiencias'] = $this->db->get('processos_audiencias')->result();
		$this->load->view('admin/relatorio_audiencia_data_buscar', $data2);
	}

	public function pesquisar_processos(){
		$this->load->helper('text');
		$dataOne = $this->input->post('dataOne');
		$dataTwo = $this->input->post('dataTwo');

		$data2['processos'] = $this->processos->pesquisar_processos_entre_datas($dataOne, $dataTwo);
		$this->db->where('data_abertura >=', $dataOne);
		$this->db->where('data_abertura <=', $dataTwo);
		$this->db->order_by('data_abertura');

		$data2['processos'] = $this->db->get('processos')->result();
		$this->load->view('admin/relatorio_processo_data_buscar', $data2);

	}
}