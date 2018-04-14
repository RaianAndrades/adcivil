<?php

class Upload extends CI_Controller {
	

	public function __construct(){
		parent::__construct();

		$this->load->model('processos_model');
	}

	function Upload()
	{
		$this->load->helper(array('form', 'url'));
	}
	
	function index()
	{	
		$this->load->view('admin/form_upload', array('error' => ' ' ));
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
			
			$this->load->view('admin/form_upload', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$this->load->view('admin/upload_sucess', $data);
		}
	}	

	function excluir($idProcesso_documento) {
		if ($this->processos_documentos->excluir($idProcesso_documento)){
			redirect(base_url('admin/processos/'));
		} else {
			die ("Não foi possivel excluir o documento deste processo.");
		}
	}
}
?>