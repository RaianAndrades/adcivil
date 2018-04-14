<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios_admin extends CI_controller {
	public function __construct(){
		parent::__construct();
	
		if($this->session->userdata('logged_in')){
					$this->load->model('Admin_model', 'usuarios');
					$this->load->helper('form');
					$this->load->library('table');
				} else {
					redirect(base_url('login'));
				}
		}

	public function index($offset=0) {
		$limite = 5;
		$data['usuarios'] = $this->usuarios->listar_usuarios_pag($limite, $offset);
		//$this->load->view('admin/html_header');

		$this->load->library('pagination');
		$config['base_url'] = base_url()."admin/usuarios/index/";
		$config['per_page'] = $limite;
		$config['total_rows'] = $this->db->get('usuarios')->num_rows();
		$config['uri_segment'] = 4;

		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';

		$this->pagination->initialize($config);
		$data['paginacao'] = $this->pagination->create_links();

		$this->load->view('admin/usuarios_dois', $data);
		$this->load->view('admin/html_footer');
	}

	public function cadastrar_usuario(){
		$this->load->view('admin/cadastrar_usuario');
	}

	public function buscar(){
		$data['usuarios'] = $this->db->get('usuarios')->result();
		$busca = $this->input->post('busca');
		$data2['busca'] = $busca;
		$this->db->like('nome', $busca);

		$data2['usuarios'] = $this->db->get('usuarios')->result();

		$this->load->view('admin/resultado_busca_usuario', $data2);
	}	

	public function ver($id){
		if(!isset($id)){
					redirect(base_url('admin/usuarios'));
				} else {
		$this->load->helper('text');
		$dados['usuarios'] = $this->usuarios->detalhes_usuario_by_id($id);
		$this->load->view('admin/ver_usuario', $dados);
		}
	}

	function adicionar(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email    = $this->input->post('email');
		$nome     = $this->input->post('nome');
		$actived  = $this->input->post(1);
		$access     = $this->input->post('access');
		if($this->usuarios->adicionar($username, $password, $email,
			$nome, $actived, $access)){
			redirect(base_url('admin/usuarios'));
		} else {
			die ("Não foi possivel adicionar o usuario.");
		}
	}

	function excluir($id){
		if(!isset($id)){
					redirect(base_url('admin/usuarios'));
				} else
		if($this->usuarios->excluir($id)){
			redirect(base_url('admin/usuarios'));
		} else {
			echo "Não foi possivel excluir o usuario.";
		}
	}

	function editar($id){
		if(!isset($id)){
					redirect(base_url('admin/usuarios'));
				} else {
		$this->db->where('id', $id);
		$data['usuarios'] = $this->db->get('usuarios')->result();
		$this->load->view('admin/usuarios_editarDois', $data);
		$this->load->view('admin/html_footer');
			}
		}

	function gravar_alteracao(){
		$id = $this->input->post('id');
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['email']    = $this->input->post('email');
		$data['nome']	  = $this->input->post('nome');
		$data['activated']  = $this->input->post('1');
		$data['access']   = $this->input->post('access');
		$this->db->where('id', $id);
		$this->db->update('usuarios', $data);

		redirect(base_url('admin/usuarios'));

	}

}