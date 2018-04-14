<div id="content">
<?php
echo heading("Alterar cliente " . img(base_url().'assets/imgs/novo.gif'), 2,
"class='divisor'");
$data = array('class'=>'formcadastros','id'=>'form_categoria');
$hidden = array('idCliente' => $idCliente);
echo form_open('admin/clientes/gravar_alteracao', $data, $hidden);
	echo form_fieldset("Alterar cliente");
		echo form_label('Nome', 'nome_cliente');
		$data = array('name'=>'nome_cliente','id'=>'nome_cliente',
			'value'=>$nome_cliente);
		echo form_input($data);
		echo form_label('Slug', 'slug_cliente');
		$data = array('name'=>'slug_cliente','id'=>'slug_cliente',
			'value'=>$slug_cliente);
		echo form_input($data);
		echo form_label('Cpf', 'cpf');
		$data = array('name'=>'cpf','id'=>'cpf',
			'value'=>$cpf);
		echo form_input($data);
		echo form_label('Rg', 'rg');
		$data = array('name'=>'rg','id'=>'rg',
			'value'=>$rg);
		echo form_input($data);
		echo form_label('Data de nascimento', 'data_nascimento');
		$data = array('name'=>'data_nascimento','id'=>'data_nascimento',
			'value'=>$data_nascimento);
		echo form_input($data);
		echo form_label('Email', 'email');
		$data = array('name'=>'email','id'=>'email',
			'value'=>$email);
		echo form_input($data);
		echo form_label('Telefone 1', 'telefoneOne');
		$data = array('name'=>'telefoneOne','id'=>'telefoneOne',
			'value'=>$telefoneOne);
		echo form_input($data);
		echo form_label('Telefone 2', 'telefoneTwo');
		$data = array('name'=>'telefoneTwo','id'=>'telefoneTwo',
			'value'=>$telefoneTwo);
		echo form_input($data);
		echo form_label('Endereço', 'endereco');
		$data = array('name'=>'endereco','id'=>'endereco',
			'value'=>$endereco);
		echo form_input($data);
		echo form_label('Numero', 'numero');
		$data = array('name'=>'numero','id'=>'numero',
			'value'=>$numero);
		echo form_input($data);
		echo form_label('Bairro', 'bairro');
		$data = array('name'=>'bairro','id'=>'bairro',
			'value'=>$bairro);
		echo form_input($data);
		echo form_label('Cep', 'cep');
		$data = array('name'=>'cep','id'=>'cep',
			'value'=>$cep);
		echo form_input($data);
		echo form_label('Cidade', 'cidade');
		$data = array('name'=>'cidade','id'=>'cidade',
			'value'=>$cidade);
		echo form_input($data);
		echo form_label('Uf', 'uf');
		$data = array('name'=>'uf','id'=>'uf',
			'value'=>$uf);
		echo form_input($data);
		echo form_label('Estado civil', 'estado_civil');
		$data = array('name'=>'estado_civil','id'=>'estado_civil',
			'value'=>$estado_civil);
		echo form_input($data);
		echo form_label('Nacionalidade', 'nacionalidade');
		$data = array('name'=>'nacionalidade','id'=>'nacionalidade',
			'value'=>$nacionalidade);
		echo form_input($data);
		echo form_label('Profissão', 'profissao');
		$data = array('name'=>'profissao','id'=>'profissao',
			'value'=>$profissao);
		echo form_input($data);
		echo form_label('Renda', 'renda');
		$data = array('name'=>'renda','id'=>'renda',
			'value'=>$renda);
		echo form_input($data);
		echo form_submit("btn_cadastro","Alterar");
	echo form_fieldset_close();
echo form_close();
?>
</div>