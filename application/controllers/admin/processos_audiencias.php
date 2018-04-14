<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Processos_Audiencias extends CI_Controller {


	public function __construct(){
		parent::__construct();


		if($this->session->userdata('logged_in')){
			$this->load->model('advogados_model', 'advogados');
			$this->load->model('processos_audiencias_model', 'processos_audiencias');
			$this->load->model('processos_advogados_model', 'processos_advogados');
			$this->load->model('audiencias_advogados_model', 'audiencias_advogados');
			$this->load->model('clientes_model','clientes');
			$this->load->model('advogados_model','advogados');
			$this->load->model('processos_model','processos');
			$this->load->helper('form');
			$this->load->library('table');	
		}	else {
			redirect(base_url('login'));
		}
	}

	public function index($offset=0) {
		$limite = 5;
		$data['processos_audiencias'] = $this->processos_audiencias->audiencias_lista_pag($limite, $offset);
		//$dados['audienciasEditar'] = $this->audiencias->listar_audiencias();
		$data['clientes'] = $this->clientes->listar_clientes();
		$data['advogados'] = $this->advogados->listar_advogados();
		$data['processos'] = $this->processos->listar_processos();
		//$dados['processos_advogados'] = $this->processos_advogados->processos_lista_advogados($id);
		//$dados['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias($id);
		//$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');

		$this->load->library('pagination');

		$config['base_url'] = base_url()."admin/processos_audiencias/index/";
		$config['per_page'] = $limite;
		$config['total_rows'] = $this->db->get('processos_audiencias')->num_rows();
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';

		$this->pagination->initialize($config);
		$data['paginacao'] = $this->pagination->create_links();

		$this->load->view('admin/audiencias_dois', $data);
		$this->load->view('admin/html_footer');
	}

	function excluir($idProcesso_Audiencia) {
		if(!isset($idProcesso_Audiencia)){
			redirect(base_url('admin/processos'));
		} else 
		$idProcesso = $this->processos_audiencias->selecionar_idProcesso($idProcesso_Audiencia);
		if($this->processos_audiencias->excluir($idProcesso_Audiencia)) {
			
			foreach($idProcesso as $i)

			redirect(base_url('admin/processos/cadastrar_processo_audiencia/' . $i->idProcesso));
		} else {
			die ("Não foi possivel excluir a audiência do processo.");
		}
	}

	public function buscar(){
		 $data['processos_audiencias'] = $this->processos_audiencias->audiencias_lista();
		 $busca = $this->input->post('busca');
		 $data2['busca'] = $busca;
		 //$this->db->like('nome_cliente',$busca);
		 //$this->db->or_like('nome_advogado', $busca);
		 //$this->db->or_like('numero_processo', $busca);
		 $this->db->or_like('numero_processo', $busca);

		 $data2['processos_audiencias'] = $this->processos_audiencias->audiencias_lista();
		 $this->load->view('admin/resultado_busca_audiencia', $data2);
	}

	public function ver($id) {
		$this->load->helper('text');

		$dados['processos_audiencias'] = $this->processos_audiencias->detalhes_audiencia_by_id($id);

		$this->load->view('admin/ver_audiencia', $dados);
	}


	function adicionar_audiencia(){
		$idProcesso = $this->input->post('idProcesso');
		$data = $this->input->post('data');
		$horario = $this->input->post('horario');
		$vara = $this->input->post('vara');
		$cidade = $this->input->post('cidade');
		$tipo_audiencia = $this->input->post('tipo_audiencia');
		$observacao = $this->input->post('observacao');
		if ($this->processos_audiencias->adicionar_audiencia( $idProcesso,
			$data, $horario, $vara, $cidade, $tipo_audiencia, $observacao)){
			redirect(base_url('admin/processos/cadastrar_processo_audiencia/' . $idProcesso));
		} else {
			die ("Não foi possível adicionar a audiência ao processo");
		}
	}

	function editar($id) {
		$this->db->where('idProcesso_Audiencia', $id);
		$dados['processosAudiencia'] = $this->db->get('processos_audiencias')->result();

		$this->load->view('admin/processos_audiencias_alterar', $dados);
	}

	function gravar_alteracao(){
		$id = $this->input->post('idProcesso_Audiencia');
		$idProcesso = $this->input->post('idProcesso');
		$data['idProcesso'] = $this->input->post('idProcesso');
		$data['data'] = $this->input->post('data');
		$data['horario'] = $this->input->post('horario');
		$data['vara'] = $this->input->post('vara');
		$data['cidade'] = $this->input->post('cidade');
		$data['tipo_audiencia'] = $this->input->post('tipo_audiencia');
		$data['observacao'] = $this->input->post('observacao');
		$this->db->where('idProcesso_Audiencia', $id);
		$this->db->update('processos_audiencias', $data);

		redirect(base_url('admin/processos/cadastrar_processo_audiencia/' . $idProcesso));
	}

	/*ADVOGADOS NA AUDIENCIA*/

	//identifica o id da audiencia para cadastrar novo advogado
	function cadastrar_audiencia_advogado($id){
		$idProcesso = $this->processos_audiencias->selecionar_idProcesso($id);
		$dados['audiencias_advogados'] = $this->audiencias_advogados->audiencias_lista_advogados($id);
		$dados['processos_audiencias'] = $this->processos_audiencias->processos_lista_audiencias($id);
		//$dados['processos_advogados'] = $this->processos_advogados->processos_lista_advogados($id);

		$dados['advogados'] = $this->advogados->listar_advogados();

		 foreach($idProcesso as $i)
		 	//  $i->idProcesso;
		$dados['processos_advogados'] = $this->processos_advogados->showAdvogadosAudiencia($i->idProcesso);


		$this->db->where('idProcesso_Audiencia', $id);
		$dados['processos_audiencias'] = $this->db->get('processos_audiencias')->result();
		
		$this->load->view('admin/audiencias_advogados', $dados);
	}

}

