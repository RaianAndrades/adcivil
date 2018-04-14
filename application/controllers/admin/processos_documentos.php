<?php

class Processos_documentos extends CI_Controller {
	

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){
			$this->load->helper('download');
			$this->load->model('processos_model','processos');
			$this->load->model('processos_documentos_model','processos_documentos');
		} else {
			redirect(base_url('login'));
		}
	}
	function Upload()
	{
		$this->load->helper(array('form', 'url'));

	}
	
	function index()
	{	
		$this->load->view('admin/form_upload', array('error' => ' ' ));
	}

	function adicionar_documento(){
		//$idProcesso_documento = $this->input->post('idProcesso_documento');
		$idProcesso = $this->input->post('idProcesso');
		$documento = $this->do_upload();
		if ($this->processos_documentos->adicionar_documento($idProcesso, $documento)){
			redirect(base_url('admin/processos/cadastrar_processo_documento/' . $idProcesso));
		} else {
			die ("Não foi possivel adicionar o documento ao processo, verifique se está entre os formatos permitidos.");
		}
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('admin/upload_form', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data']['file_name'];
			//$this->load->view('admin/upload_sucess', $data);
		}
	}	

	function excluir($idProcesso_documento) {
		if(!isset($idProcesso_documento)){
					redirect(base_url('admin/processos'));
				} else
		$idProcesso = $this->processos_documentos->selecionar_idProcesso($idProcesso_documento);
		if ($this->processos_documentos->excluir($idProcesso_documento)){

			foreach($idProcesso as $i)
			redirect(base_url('admin/processos/cadastrar_processo_documento/' . $i->idProcesso ));
		} else {
			die ("Não foi possivel excluir o documento deste processo.");
		}
	}

	public function baixar_documento($documento){
		$dados = file_get_contents(base_url("/uploads/" . $documento ));
		$nome = $documento;
		force_download($nome, $dados);
	}
}	
?>