<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Clientes extends CI_controller {
	public function __construct(){
		parent::__construct();
	
		if($this->session->userdata('logged_in')){
					$this->load->model('Clientes_model', 'clientes');
					$this->load->helper('form');
					$this->load->library('table');
				} else {
					redirect(base_url('login'));
				}
		}
		
		public function index($offset=0) {
			$limite = 5;
			$data['clientes'] = $this->clientes->listar_clientes_pag($limite, $offset);
			$this->load->view('admin/html_header');
		
			/*PAGINACAO*/
			$this->load->library('pagination');
			$config['base_url'] = base_url()."admin/clientes/index/";
			$config['per_page'] = $limite;
			$config['total_rows'] = $this->db->get('clientes')->num_rows();
			$config['uri_segment'] = 4;
			
			$config['first_link'] = 'Primeiro';
			$config['last_link'] = 'Ultimo';

			$this->pagination->initialize($config);
			$data['paginacao'] = $this->pagination->create_links();

			$this->load->view('admin/clientes_dois', $data);
			$this->load->view('admin/html_footer');
		}





		// public function buscar($offset=0){
		// 	$limite = 4;

		// 	$busca = $this->input->post('busca');
		// 	$data['clientes'] = $this->clientes->buscar_clientes_pag($limite, $offset, $busca);
		// 	$data['busca'] = $busca;
		//  	// $data2['busca'] = $busca;
		//  	// $this->db->like('nome_cliente',$busca);
		//  	// $this->db->or_like('rg',$busca);
		//  	// $data2['clientes'] = $this->db->get('clientes')->result();

		//  	//$data2 = $busca;

		// 	$this->load->library('pagination');

		// 	$config['base_url'] = base_url()."admin/clientes/buscar/index/";
		// 	$config['per_page'] = $limite;
		// 	$config['total_rows'] = $this->db->get('clientes')->num_rows();
		// 	$config['uri_segment'] = 4;
		// 	$config['first_link'] = 'Primeiro';
		// 	$config['last_link'] = 'Ultimo';

		// 	$this->pagination->initialize($config);
		// 	$data['paginacao'] = $this->pagination->create_links();

		// 	$this->load->view('admin/resultado_busca_cliente', $data);
		// }

		 public function buscar(){
		 	$data['clientes'] = $this->db->get('clientes')->result();
		 	$busca = $this->input->post('busca');
		 	$data2['busca'] = $busca;
		 	$this->db->like('nome_cliente',$busca);
		 	//$this->db->or_like('rg',$busca);
		 	$data2['clientes'] = $this->db->get('clientes')->result();

		 	$this->load->view('admin/resultado_busca_cliente', $data2);
		 }

		// public function index() {
		// 	$this->load->library('pagination');

		
		// 	$config['base_url'] = base_url()."admin/clientes/index/";
		// 	$config['per_page'] = 5;
		// 	$config['num_links'] = 5;
		// 	$config['total_rows'] = $this->db->get('clientes')->num_rows();

		// 	$this->pagination->initialize($config);
		// 	$data['query'] = $this->db->get('clientes', $config['per_page'], $this->uri->segment(5));

		// 	// $config['uri_segment'] = 3;
		// 	// $config['first_link'] = 'Primeiro';
		// 	// $config['last_link'] = 'Ultimo';
			

		// 	$this->load->view('admin/clientes_dois', $data);
		// 	//$this->load->view('admin/html_footer');
		// }



		public function cadastrar_cliente(){
			$this->load->view('admin/cadastrar_cliente');
		}

		public function ver($id){
			if(!isset($id)){
					redirect(base_url('admin/clientes'));
				} else {
			$this->load->helper('text');
			$dados['clientes'] = $this->clientes->detalhes_cliente_by_id($id);
			$this->load->view('admin/ver_cliente', $dados);
		}
		}

		public function ver_aniversario_clientes(){
			$this->load->helper('text');
			$dados['clientes'] = $this->clientes->listar_clientes_aniversario_todos();
			$this->load->view('admin/ver_datas_cliente', $dados);
		}

		function adicionar(){
			$nome_cliente     = $this->input->post('nome_cliente');
			$doc_cliente      = $this->input->post('doc_cliente');
			$rg               = $this->input->post('rg');
			$data_nascimento  = $this->input->post('data_nascimento');
			$email            = $this->input->post('email');
			$telefoneOne      = $this->input->post('telefoneOne');
			$telefoneTwo      = $this->input->post('telefoneTwo');
			$endereco         = $this->input->post('endereco');
			$numero           = $this->input->post('numero');
			$bairro           = $this->input->post('bairro');
			$cep              = $this->input->post('cep');
			$cidade           = $this->input->post('cidade');
			$uf               = $this->input->post('uf');
			$estado_civil     = $this->input->post('estado_civil');
			$nacionalidade    = $this->input->post('nacionalidade');
			$profissao        = $this->input->post('profissao');
			$renda            = $this->input->post('renda');
			if ($this->clientes->adicionar($nome_cliente,$doc_cliente,$rg,$data_nascimento,$email,$telefoneOne,$telefoneTwo,
			$endereco,$numero,$bairro,$cep,$cidade,$uf,$estado_civil,$nacionalidade,$profissao,$renda)) { 
				redirect(base_url('admin/clientes'));
			}
			else {
				die ("Não foi possível adicionar o cliente.");
			}
		}

		function excluir($idCliente){
			if(!isset($idCliente)){
					redirect(base_url('admin/clientes'));
				} else
			if ($this->clientes->excluir($idCliente)){
				redirect(base_url('admin/clientes'));
			}
			else
				// if(!$idCliente){
				// 	redirect(base_url('admin/clientes'));
				// } else 
			{

				echo ("Não foi possivel excluir o cliente.");
			}
		}

		function editar($id){
			//$dados ['getCliente'] = $this->clientes->get_cliente($cliente);
			//$this->load->view('admin/html_header');
			//$this->load->view('admin/menu');
			if(!isset($id)){
					redirect(base_url('admin/clientes'));
				} else {
			$this->db->where('idCliente', $id);
			$data['clientes'] = $this->db->get('clientes')->result();
			$this->load->view('admin/clientes_editarDois', $data);
			$this->load->view('admin/html_footer');
			}
		}

		function gravar_alteracao(){
			$id = $this->input->post('idCliente');
			//$data['idCliente']      	= $this->input->post('idCliente');
			$data['nome_cliente']  		= $this->input->post('nome_cliente');
			$data['doc_cliente'] 		= $this->input->post('doc_cliente');
			$data['rg']  				= $this->input->post('rg');
			$data['data_nascimento']	= $this->input->post('data_nascimento');
			$data['email']          	= $this->input->post('email');
			$data['telefoneOne']    	= $this->input->post('telefoneOne');
			$data['telefoneTwo']    	= $this->input->post('telefoneTwo');
			$data['endereco']       	= $this->input->post('endereco');
			$data['numero']         	= $this->input->post('numero');
			$data['bairro']         	= $this->input->post('bairro');
			$data['cep']            	= $this->input->post('cep');
			$data['cidade']         	= $this->input->post('cidade');
			$data['uf']             	= $this->input->post('uf');
			$data['estado_civil']   	= $this->input->post('estado_civil');
			$data['nacionalidade']  	= $this->input->post('nacionalidade');
			$data['profissao']      	= $this->input->post('profissao');
			$data['renda']          	= $this->input->post('renda');
			$this->db->where('idCliente',$id);
			$this->db->update('clientes', $data);
			// if ($this->clientes->gravar_alteracao($idCliente, $nome_cliente, $slug_cliente, $cpf, $rg,$data_nascimento, $email,$telefoneOne,$telefoneTwo,
			// $endereco,$numero,$bairro,$cep,$cidade,$uf,$estado_civil,$nacionalidade,$profissao,$renda)){
				redirect(base_url('admin/clientes'));
			// } else {
			// 	die("Não foi possível alterar o cliente");
			// }
		}
}