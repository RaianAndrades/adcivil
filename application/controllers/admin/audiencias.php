<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Audiencias extends CI_Controller {

	public function __construct(){
		parent::__construct();
				// if(!$this->session->userdata('session_id')
		// 	|| !$this->session->userdata('logado')) {
		// 	redirect(base_url('admin/home'));
		// }
		if($this->session->userdata('logged_in')){
			$this->load->model('audiencias_model','audiencias');
			$this->load->model('clientes_model','clientes');
			$this->load->model('advogados_model','advogados');
			$this->load->model('processos_model','processos');
			$this->load->helper('form');
			$this->load->library('table');
		}	 else {
			redirect(base_url('login'));
		}
	}

	public function index($offset=0) {
		$limite = 5;
		$dados['audiencias'] = $this->audiencias->audiencias_lista_pag($limite, $offset);
		$dados['audienciasEditar'] = $this->audiencias->listar_audiencias();
		$dados['clientes'] = $this->clientes->listar_clientes();
		$dados['advogados'] = $this->advogados->listar_advogados();
		$dados['processos'] = $this->processos->listar_processos();
		//$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');

		$this->load->library('pagination');

		$config['base_url'] = base_url()."admin/audiencias/index/";
		$config['per_page'] = $limite;
		$config['total_rows'] = $this->db->get('audiencias')->num_rows();
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';

		$this->pagination->initialize($config);
		$data['paginacao'] = $this->pagination->create_links();

		$this->load->view('admin/audiencias_dois', $dados);
		$this->load->view('admin/html_footer');
	}

	public function cadastrar_audiencia(){
		$this->load->view('admin/cadastrar_audiencia');
	}

	public function ver($id) {
		$this->load->helper('text');

		$dados['audiencias'] = $this->audiencias->detalhes_audiencia_by_id($id);


		$this->load->view('admin/ver_audiencia', $dados);
	}


	public function buscar(){
		 $data['audiencias'] = $this->audiencias->audiencias_lista();
		 $busca = $this->input->post('busca');
		 $data2['busca'] = $busca;
		 $this->db->like('nome_cliente',$busca);
		 //$this->db->or_like('nome_advogado', $busca);
		 //$this->db->or_like('numero_processo', $busca);
		 $this->db->or_like('data', $busca);

		 $data2['audiencias'] = $this->audiencias->audiencias_lista();
		 $this->load->view('admin/resultado_busca_audiencia', $data2);

	}

	function adicionar() {
		$idNumeroProcesso = $this->input->post('idNumeroProcesso');
		$data = $this->input->post('data');
		$horario = $this->input->post('horario');
		// $idClienteAudiencia = $this->input->post('idClienteAudiencia');
		// $idAdvogadoUm = $this->input->post('idAdvogadoUm');
		// $idAdvogadoDois = $this->input->post('idAdvogadoDois');
		$vara = $this->input->post('vara');
		$cidade = $this->input->post('cidade');
		$tipo_audiencia = $this->input->post('tipo_audiencia');
		$contato_cliente = $this->input->post('contato_cliente');
		$observacao = $this->input->post('observacao');

		if ($this->audiencias->adicionar($idNumeroProcesso, $data, $horario,
			 $vara, $cidade, $tipo_audiencia,
			$contato_cliente, $observacao)) {
			redirect(base_url('admin/audiencias'));
		} else {
			die ("Não foi possivel adicionar a audiência");
		}
	}

	function excluir($idAudiencia) {
		if ($this->audiencias->excluir($idAudiencia)) {
			redirect(base_url('admin/audiencias'));
		}
		else {
			die ("Não foi possivel excluir a audiência");
		}
	}

	function editar($id) {
		//$dados['getAudiencia'] = $this->audiencias->get_audiencia($audiencia);
		$dados['clientes'] = $this->clientes->listar_clientes();
		$dados['advogados'] = $this->advogados->listar_advogados();
		$dados['processos'] = $this->processos->listar_processos();
		$this->db->where('idAudiencia', $id);
		$dados['audienciasEditar'] = $this->db->get('audiencias')->result();

		//$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');
		$this->load->view('admin/audiencias_editarDois', $dados);
		$this->load->view('admin/html_footer');
		//tratamento de erros
	}

	function gravar_alteracao() {
		$id = $this->input->post('idAudiencia');

		$data['idAudiencia'] = $this->input->post('idAudiencia');
		$data['idNumeroProcesso'] = $this->input->post('idNumeroProcesso');
		$data['data'] = $this->input->post('data');
		$data['horario'] = $this->input->post('horario');
		$data['vara'] = $this->input->post('vara');
		$data['cidade'] = $this->input->post('cidade');
		$data['tipo_audiencia'] = $this->input->post('tipo_audiencia');
		$data['contato_cliente'] = $this->input->post('contato_cliente');
		$data['observacao'] = $this->input->post('observacao');

		$this->db->where('idAudiencia', $id);
		$this->db->update('audiencias', $data);
		// if ($this->audiencias->gravar_alteracao($idAudiencia, $slug_audiencia, $idNumeroProcesso, $data, $horario,
		// 	$idClienteAudiencia, $idAdvogadoUm, $idAdvogadoDois, $vara, $tipo_audiencia,
		// 	$contato_cliente, $observacao)) {
			redirect(base_url('admin/audiencias'));
		// } else {
		// 	die ("Não foi possivel alterar a audiência");
		// }
	}
}