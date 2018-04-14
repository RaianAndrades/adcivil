<?php
	class Admin_model extends CI_Model{
		var $id;
		var $username;
		var $password;
		var $email;
		var $nome;
		var $activated;
		var $access;

		function __construct(){
			parent::__construct();
		}

		function checar_login($username, $password){
			$sha1_password = sha1($password);

			$query_str = "SELECT id FROM usuarios WHERE username = '" . $username . "' AND password = '" . $password . "'";

			$result = $this->db->query($query_str, array($username, $sha1_password));

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return FALSE;
			}
		}

		function carregaInfoUsuario($id){
			$query = $this->db>query("SELECT * FROM usuarios WHERE id='".$id."'");

			return $query->result();
		}

		public function acesso_usuario($username, $access){
			$this->db->where('username', $this->input->post('username'));
			$this->db->select($access); //precisa o valor do acesso
			//$this->db->field_data($access);
			//$this->db->where($where);
			$query = $this->db->get($username); 
			$row = $query->row_array(); 
			return $row['access']; //retorna o valor
		} 

		// public function listar_usuarios_pag($limite, $offset){
		// 	$this->db->limit($limite, $offset);

		// 	$this->db->select('u.id, u.nome, u.email, u.username, u.password, a.nome as acesso');
		// 	$this->db->from('usuarios as u');
		// 	$this->db->join('access as a','u.id = a.id','INNER');
		// 	$this->db->order_by('nome');
		// 	return $this->db->get()->result();
		// }

		public function listar_usuarios_pag($limite, $offset){
			$this->db->limit($limite, $offset);

			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->order_by('nome');
			return $this->db->get()->result();
		}

		public function usuario($usuario, $offset=null, $numero_itens=null){
			$this->db->where('id', $usuario);
			return $this->db->get('usuarios', $numero_itens, $offset)->result();
		}

		public function detalhes_usuario_by_id($id){
			$this->db->where('id', $id);
			$usuarios = $this->db->get('usuarios')->result();
			if (count($usuarios)==1) {
				foreach($usuarios as $usuario) {
					$this->id  		= $usuario->id;
					$this->username = $usuario->username;
					$this->password = $usuario->password; 
					$this->email    = $usuario->email;
					$this->nome     = $usuario->nome;
					$this->access   = $usuario->access;
				}
				$dados['usuarios'] = $this;
			}
			else {
				$dados['usuarios'] = null;
			}
			return $dados;
		}

	

		function showAcessoUsuarios(){
			$res = $this->db->query("SELECT value, nome FROM access");
			if($res->result()){
				foreach($res->result() as $r){
					echo "<option value='".$r->value."'>".$r->nome."</option>";
				}
			} 
		}		

		function getAccess($value){
			$this->db->select('nome');
			$this->db->from('access');
			$this->db->where('value', $value);
			return $this->db->get()->result();
		}


	public function contar_itens_usuario_by_id($id){
		$this->db->select('count(*) as total');
		$this->db->from('usuarios');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}

	function adicionar($username, $password, $email, $nome, $activated, $access){
		$this->username  = $username;
		$this->password  = $password;
		$this->email     = $email;
		$this->nome      = $nome;
		$this->activated = $activated;
		$this->access    = $access;
		return $this->db->insert('usuarios', $this);
	}

	function excluir($id){
		$this->db->where('id', $id);
		return $this->db->delete('usuarios');
	}

}