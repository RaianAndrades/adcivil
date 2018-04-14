<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Error_404 extends CI_controller {
	
	public function __construct(){
			parent::__construct();


		}


		public function erros(){
			$this->load->view('erro_404');
		}
	}

