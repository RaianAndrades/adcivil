<div id="content">
<?php
echo heading ("Alterar advogado " . img(base_url().'assets/imgs/novo.gif'), 2,
	"class='divisor'");
$data = array('class'=>'formcadastros','id'=>'form_categoria');
$hidden = array('idAdvogado' => $idAdvogado);
echo form_open('admin/advogados/gravar_alteracao', $data, $hidden);
	echo form_fieldset("Alterar advogado");
		echo form_label('Nome', 'nome_advogado');
		$data = array('name'=>'nome_advogado','id'=>'nome_advogado',
			'value'=>$nome_advogado);
		echo form_input($data);	
		echo form_label('Slug', 'slug_advogado');
		$data = array('name'=>'slug_advogado','id'=>'slug_advogado',
			'value'=>$slug_advogado);
		echo form_input($data);	
		echo form_label('Nº OAB', 'numero_oab');
		$data = array('name'=>'numero_oab','id'=>'numero_oab',
			'value'=>$numero_oab);
		echo form_input($data);	
		echo form_label('Rg', 'rg');
		$data = array('name'=>'rg','id'=>'rg',
			'value'=>$rg);
		echo form_input($data);	
		echo form_label('Cpf', 'cpf');
		$data = array('name'=>'cpf','id'=>'cpf',
			'value'=>$cpf);
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
		echo form_label('Número', 'numero');
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
		echo form_label('Cidade', 'Cidade');
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
		echo form_label('Possui filhos? Caso sim, quantos?', 'possui_filhos');
		$data = array('name'=>'possui_filhos','id'=>'possui_filhos',
			'value'=>$possui_filhos);
		echo form_input($data);	
		echo form_label('Nacionalidade', 'nacionalidade');
		$data = array('name'=>'nacionalidade','id'=>'nacionalidade',
			'value'=>$nacionalidade);
		echo form_input($data);	
		echo form_label('Data de nascimento', 'data_nascimento');
		$data = array('name'=>'data_nascimento','id'=>'data_nascimento',
			'value'=>$data_nascimento);
		echo form_input($data);	
		echo form_label('Possui outra graduação?', 'possui_outra_graduacao');
		$data = array('name'=>'possui_outra_graduacao','id'=>'possui_outra_graduacao',
			'value'=>$possui_outra_graduacao);
		echo form_input($data);	
		echo form_submit("btn_cadastro","Alterar");
	echo form_fieldset_close(); 
echo form_close();
?>
</div>