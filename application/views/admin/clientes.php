<div id="content">
<?php
$data = array('class'=>'form-group','id'=>'form_categoria'); ////////////////
echo heading("Clientes cadastrados " . img(base_url('assets/imgs/novo.gif')),
	2, "class='divisor'");
		$array_clientes = array();
		foreach($clientes as $cliente) {
			$push = array(
				anchor(
					base_url("admin/clientes/excluir/" . $cliente->idCliente),
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a exclusão deste cliente?');")
				),
				anchor(
					base_url("admin/clientes/editar/" . $cliente->idCliente),
					img('assets/imgs/gear.gif')
				),
				$cliente->nome_cliente,
				$cliente->slug_cliente,
				$cliente->cpf,
				$cliente->rg
			);
			array_push($array_clientes,$push);
		}
	echo "<div class='wraper_table'>";
		$this->table->set_heading('Excluir','Editar','Cliente','Slug','Cpf','Rg');
		$template = array('table_open'=>'<table>');
		$this->table->set_template($template);
		echo $this->table->generate($array_clientes);
	echo "</div>";
echo heading("Cadastrar novo cliente " . img(base_url().'assets/imgs/novo.gif'), 2,
	"class='divisor'");
echo form_open('admin/clientes/adicionar',$data);
	echo form_fieldset("Cadastrar novo cliente");
		//INCLUIR SLUG
		echo form_label('Nome', 'nome_cliente');
		$data = array('name'=>'nome_cliente','id'=>'nome_cliente');
		echo form_input($data);
		echo form_label('Slug', 'slug_cliente');
		$data = array('name'=>'slug_cliente','id'=>'slug_cliente');
		echo form_input($data);
		echo form_label('Cpf', 'cpf');
		$data = array('name'=>'cpf','id'=>'cpf');
		echo form_input($data);
		echo form_label('Rg', 'rg');
		$data = array('name'=>'rg','id'=>'rg');
		echo form_input($data);
		echo form_label('Data de nascimento', 'data_nascimento');
		$data = array('name'=>'data_nascimento','id'=>'data_nascimento');
		echo form_input($data);
		echo form_label('Email', 'email');
		$data = array('name'=>'email','id'=>'email');
		echo form_input($data);
		echo form_label('Telefone 1', 'telefoneOne');
		$data = array('name'=>'telefoneOne','id'=>'telefoneOne');
		echo form_input($data);
		echo form_label('Telefone 2', 'telefoneTwo');
		$data = array('name'=>'telefoneTwo','id'=>'telefoneTwo');
		echo form_input($data);
		echo form_label('Endereço', 'endereco');
		$data = array('name'=>'endereco','id'=>'endereco');
		echo form_input($data);
		echo form_label('Numero', 'numero');
		$data = array('name'=>'numero','id'=>'numero');
		echo form_input($data);
		echo form_label('Bairro', 'bairro');
		$data = array('name'=>'bairro','id'=>'bairro');
		echo form_input($data);
		echo form_label('Cep', 'cep');
		$data = array('name'=>'cep','id'=>'cep');
		echo form_input($data);
		echo form_label('Cidade', 'cidade');
		$data = array('name'=>'cidade','id'=>'cidade');
		echo form_input($data);
		echo form_label('Uf', 'uf');
		$data = array('name'=>'uf','id'=>'uf');
		echo form_input($data);
		echo form_label('Estado civil', 'estado_civil');
		$data = array('name'=>'estado_civil','id'=>'estado_civil');
		echo form_input($data);
		echo form_label('Nacionalidade', 'nacionalidade');
		$data = array('name'=>'nacionalidade','id'=>'nacionalidade');
		echo form_input($data);
		echo form_label('Profissão', 'profissao');
		$data = array('name'=>'profissao','id'=>'profissao');
		echo form_input($data);
		echo form_label('Renda', 'renda');
		$data = array('name'=>'renda','id'=>'renda');
		echo form_input($data);
		//////////////////////////////////////// CADASTRAR OUTROS
		echo form_submit("btn_cadastro","Cadastrar");
	echo form_fieldset_close();
echo form_close();
?>
</div>