<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Advogados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->is_logged_in();
		// if(!$this->session->userdata('session_id')
		 //	|| !$this->session->userdata('logado')) {
		// 	redirect(base_url('admin/advogados'));


		
		//if($res = $this->session->userdata('logged_in')&& ($res[0]->access == '1')){
			if($this->session->userdata('logged_in')&&($this->session->userdata('access')==1)){
				$this->load->model('advogados_model','advogados');
				$this->load->helper('form');
				$this->load->library('table');
				
			} else {
				redirect(base_url('admin/home'));
			}
		}

		// function is_logged_in(){
		// 	$is_logged_in = $this->session->userdata('is_logged_in');

		// 	if(!isset($is_logged_in) || $is_logged_in != true)
		// 	{
		// 		echo 'Você não tem permissão para acessar essa pagina.';
		// 		die();
		// 	}
		// }

		// function usuarios()
		// 	{
		// 		$this->load->view('somente_usuarios');
		// 	}

	public function index($offset=0) {
		$limite = 5;
		$data['advogados'] = $this->advogados->listar_advogados_pag($limite, $offset);
		$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');
		//$this->load->view('admin/advogados', $dados);

		/*PAGINACAO*/
		$this->load->library('pagination');

		$config['base_url'] = base_url()."admin/advogados/index/";
		$config['per_page'] = $limite;
		$config['total_rows'] = $this->db->get('advogados')->num_rows();
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Primeiro';
		$confíg['last_link'] = 'Ultimo';

		$this->pagination->initialize($config);
		$data['paginacao'] = $this->pagination->create_links();

		$this->load->view('admin/advogados_dois', $data);
		//$this->load->view('admin/advogados_uso', $dados);
		//$this->load->view('admin/menu-teste', $dados); melhor
		$this->load->view('admin/html_footer');
	}

	

	public function cadastrar_advogado(){
		$this->load->view('admin/cadastrar_advogado');
	}

	public function ver($id) {
		if(!isset($id)){
					redirect(base_url('admin/clientes'));
				} else {
		$this->load->helper('text');
		$dados['advogados'] = $this->advogados->detalhes_advogado_by_id($id);

		$this->load->view('admin/ver_advogado', $dados);
		}
	}

	public function ver_aniversario_advogados(){
		$this->load->helper('text');
		$dados['advogados'] = $this->advogados->listar_advogados_aniversario_todos();
		$this->load->view('admin/ver_datas_advogados', $dados);
	}


	public function buscar(){
		$data['advogados'] = $this->db->get('advogados')->result();
		$busca = $this->input->post('busca');
		$data2['busca'] = $busca;
		$this->db->like('nome_advogado',$busca);
		$this->db->order_by('nome_advogado');

		$data2['advogados'] = $this->db->get('advogados')->result();
		$this->load->view('admin/resultado_busca_advogado', $data2);
	}

	function adicionar() {
		$dados['advogados'] = $this->advogados->listar_advogados();
		$nome_advogado         = $this->input->post('nome_advogado');
		$numero_oab            = $this->input->post('numero_oab');
		$rg                    = $this->input->post('rg');
		$cpf          		   = $this->input->post('cpf');
		$email                 = $this->input->post('email');
		$telefoneOne           = $this->input->post('telefoneOne');
		$telefoneTwo           = $this->input->post('telefoneTwo');
		$endereco              = $this->input->post('endereco');
		$numero                = $this->input->post('numero');
		$bairro                = $this->input->post('bairro');
		$cep                   = $this->input->post('cep');
		$cidade                = $this->input->post('cidade');
		$uf                    = $this->input->post('uf');
		$estado_civil          = $this->input->post('estado_civil');
		$possui_filhos 		   = $this->input->post('possui_filhos');
		$nacionalidade 		   = $this->input->post('nacionalidade');
		$data_nascimento 	   = $this->input->post('data_nascimento');
		$possui_outra_graduacao = $this->input->post('possui_outra_graduacao');
		if ($this->advogados->adicionar($nome_advogado, $numero_oab, $rg, $cpf, $email, $telefoneOne, $telefoneTwo, $endereco,
			$numero, $bairro, $cep, $cidade, $uf, $estado_civil, $possui_filhos, $nacionalidade, $data_nascimento, $possui_outra_graduacao)) {
			redirect(base_url('admin/advogados'));
		} else {
			die ("Não foi possivel adicionar o advogado.");
		}
	}

	function excluir($idAdvogado) {
		if(!isset($idAdvogado)){
					redirect(base_url('admin/advogados'));
				} else
		if ($this->advogados->excluir($idAdvogado)){
			redirect(base_url('admin/advogados'));
		}
		else {
			die ("Não foi possivel excluir o advogado");
		}
	}

	function editar($id) {
		// $dados['getAdvogado'] = $this->advogados->get_advogado($advogado);///////////////////////////////////////////////
		// $dadosAdvogado['dadosAdvogado'] = $this->advogados->carrega($dados);
		if(!isset($id)){
					redirect(base_url('admin/clientes'));
				} else {
		$this->db->where('idAdvogado', $id);
		$data['advogados'] = $this->db->get('advogados')->result();
		//$this->load->view('admin/html_header');
		//$this->load->view('admin/menu');
		$this->load->view('admin/advogados_editarDois', $data);
		$this->load->view('admin/html_footer');
		// if($this->advogados->get_advogado==NULL){
		// 	redirect(base_url('admin/advogados'));
		// }
	}

	}

	function gravar_alteracao(){
		$id = $this->input->post('idAdvogado');

		// $data['idAdvogado'] 		   = $this->input->post('idAdvogado');
		$data['nome_advogado']          = $this->input->post('nome_advogado');
		$data['numero_oab']            	= $this->input->post('numero_oab');
		$data['rg']                     = $this->input->post('rg');
		$data['cpf']           			= $this->input->post('cpf');
		$data['email']                  = $this->input->post('email');
		$data['telefoneOne']            = $this->input->post('telefoneOne');
		$data['telefoneTwo']            = $this->input->post('telefoneTwo');
		$data['endereco']               = $this->input->post('endereco');
		$data['numero']                 = $this->input->post('numero');
		$data['bairro']                 = $this->input->post('bairro');
		$data['cep']                    = $this->input->post('cep');
		$data['cidade']                 = $this->input->post('cidade');
		$data['uf']                     = $this->input->post('uf');
		$data['estado_civil']           = $this->input->post('estado_civil');
		$data['possui_filhos'] 		    = $this->input->post('possui_filhos');
		$data['nacionalidade'] 		    = $this->input->post('nacionalidade');
		$data['data_nascimento'] 	    = $this->input->post('data_nascimento');
		$data['possui_outra_graduacao'] = $this->input->post('possui_outra_graduacao');

		$this->db->where('idAdvogado', $id);
		$this->db->update('advogados', $data);
		// if ($this->advogados->gravar_alteracao($idAdvogado, $nome_advogado,$slug_advogado, $numero_oab, $rg, $cpf, $email, $telefoneOne, $telefoneTwo, $endereco,
		// 	$numero, $bairro, $cep, $cidade, $uf, $estado_civil, $possui_filhos, $nacionalidade, $data_nascimento, $possui_outra_graduacao)) {
		//if (isset($_POST['submit'])) {
			redirect(base_url('admin/advogados'));
		// } else {
		// 		die ("Não foi possivel alterar os dados do advogado");
		// }
		// } else {
		// 	die ("Não foi possivel alterar os dados do advogado");
		// }
	}
}