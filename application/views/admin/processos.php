<div id="content">
<?php
$data = array('class'=>'formcadastros','id'=>'form_categoria');
echo heading("Processos cadastrados " . img(base_url('assets/imgs/novo.gif')),
	2, "class='divisor'");
		$array_processos = array();
		foreach($processos as $processo) {
			$push = array(
				anchor(
					base_url("admin/processos/excluir/" . $processo->idProcesso),
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a exclusão deste processo?');")
				),
				anchor(
					base_url("admin/processos/editar/" . $processo->idProcesso),
					img('assets/imgs/gear.gif')
				),
				$processo->numero_processo,
				$processo->data_abertura,
				$processo->idAdvogadoUm,
				$processo->idAdvogadoDois,
				$processo->tipo_de_acao
			);
			array_push($array_processos, $push);
		}
	echo "<div class='wraper_table'>";
		$this->table->set_heading('Excluir', 'Editar', 'Nº processo', 'Data de abertura', 'Advogado 1', 'Advogado 2', 'Tipo de ação');
		$template = array('table_open'=>'<table>');
		$this->table->set_template($template);
		echo $this->table->generate($array_processos);
	echo "</div>";
echo heading("Cadastrar novo processo " . img(base_url().'assets/imgs/novo,gif'), 2,
	"class='divisor'");
echo form_open('admin/processos/adicionar', $data);
	echo form_fieldset("Cadastrar novo processo");
		echo form_label('Slug', 'slug_processo');
		$data = array('name'=>'slug_processo','id'=>'slug_processo');
		echo form_input($data);	
		echo form_label('Nº processo', 'numero_processo');
		$data = array('name'=>'numero_processo','id'=>'numero_processo');
		echo form_input($data);	
		echo form_label('Data de abertura', 'data_abertura');
		$data = array('name'=>'data_abertura','id'=>'data_abertura');
		echo form_input($data);	
		echo form_label('Situação do cliente', 'situacao_cliente');
		$data = array('name'=>'situacao_cliente','id'=>'situacao_cliente');
		echo form_input($data);	
		 echo form_label('Cliente', 'idClienteProcesso'); //ESCOLHER CLIENTE
		 $data = array('name'=>'idClienteProcesso','id'=>'idClienteProcesso');
		 echo form_input($data);	
		 echo form_label('Advogado 1', 'idAdvogadoUm'); //ESCOLHER ADVOGADO 1
		 $data = array('name'=>'idAdvogadoUm','id'=>'idAdvogadoUm');
		 echo form_input($data);	
		 echo form_label('Advogado 2', 'idAdvogadoDois'); //ESCOLHER ADVOGADO 2
		 $data = array('name'=>'idAdvogadoDois','id'=>'idAdvogadoDois');
		 echo form_input($data);	
		echo form_label('Tipo de ação', 'tipo_de_acao');
		$data = array('name'=>'tipo_de_acao','id'=>'tipo_de_acao');
		echo form_input($data);	
		echo form_label('Nome da outra parte', 'nome_outra_parte
			');
		$data = array('name'=>'nome_outra_parte','id'=>'nome_outra_parte');
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
		echo form_label('Número', 'numero');
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
		echo form_label('Nome testemunha 1', 'nome_testemunha_um');
		$data = array('name'=>'nome_testemunha_um','id'=>'nome_testemunha_um');
		echo form_input($data);	
		echo form_label('Email testemunha 1', 'email_testemunha_um');
		$data = array('name'=>'email_testemunha_um','id'=>'email_testemunha_um');
		echo form_input($data);	
		echo form_label('Telefone testemunha 1', 'telefone_testemunha_um');
		$data = array('name'=>'telefone_testemunha_um','id'=>'telefone_testemunha_um');
		echo form_input($data);	
		echo form_label('Endereço testemunha 1', 'endereco_testemunha_um');
		$data = array('name'=>'endereco_testemunha_um','id'=>'endereco_testemunha_um');
		echo form_input($data);	
		echo form_label('Número testemunha 1', 'numero_testemunha_um');
		$data = array('name'=>'numero_testemunha_um','id'=>'numero_testemunha_um');
		echo form_input($data);	
		echo form_label('Bairro testemunha 1', 'bairro_testemunha_um');
		$data = array('name'=>'bairro_testemunha_um','id'=>'bairro_testemunha_um');
		echo form_input($data);	
		echo form_label('Cep testemunha 1', 'cep_testemunha_um');
		$data = array('name'=>'cep_testemunha_um','id'=>'cep_testemunha_um');
		echo form_input($data);	
		echo form_label('Cidade testemunha 1', 'cidade_testemunha_um');
		$data = array('name'=>'cidade_testemunha_um','id'=>'cidade_testemunha_um');
		echo form_input($data);	
			echo form_label('Uf testemunha 1', 'uf_testemunha_um');
		$data = array('name'=>'uf_testemunha_um','id'=>'uf_testemunha_um');
		echo form_input($data);	

		echo form_label('Nome testemunha 2', 'nome_testemunha_dois');
		$data = array('name'=>'nome_testemunha_dois','id'=>'nome_testemunha_dois');
		echo form_input($data);	
		echo form_label('Email testemunha 2', 'email_testemunha_dois');
		$data = array('name'=>'email_testemunha_dois','id'=>'email_testemunha_dois');
		echo form_input($data);	
		echo form_label('Telefone testemunha 2', 'telefone_testemunha_dois');
		$data = array('name'=>'telefone_testemunha_dois','id'=>'telefone_testemunha_dois');
		echo form_input($data);	
		echo form_label('Endereço testemunha 2', 'endereco_testemunha_dois');
		$data = array('name'=>'endereco_testemunha_dois','id'=>'endereco_testemunha_dois');
		echo form_input($data);	
		echo form_label('Número testemunha 2', 'numero_testemunha_dois');
		$data = array('name'=>'numero_testemunha_dois','id'=>'numero_testemunha_dois');
		echo form_input($data);	
		echo form_label('Bairro testemunha 2', 'bairro_testemunha_dois');
		$data = array('name'=>'bairro_testemunha_dois','id'=>'bairro_testemunha_dois');
		echo form_input($data);	
		echo form_label('Cep testemunha 2', 'cep_testemunha_dois');
		$data = array('name'=>'cep_testemunha_dois','id'=>'cep_testemunha_dois');
		echo form_input($data);	
		echo form_label('Cidade testemunha 2', 'cidade_testemunha_dois');
		$data = array('name'=>'cidade_testemunha_dois','id'=>'cidade_testemunha_dois');
		echo form_input($data);	
			echo form_label('Uf testemunha 2', 'uf_testemunha_dois');
		$data = array('name'=>'uf_testemunha_dois','id'=>'uf_testemunha_dois');
		echo form_input($data);	

		echo form_label('Nome testemunha 3', 'nome_testemunha_tres');
		$data = array('name'=>'nome_testemunha_tres','id'=>'nome_testemunha_tres');
		echo form_input($data);	
		echo form_label('Email testemunha 3', 'email_testemunha_tres');
		$data = array('name'=>'email_testemunha_tres','id'=>'email_testemunha_tres');
		echo form_input($data);	
		echo form_label('Telefone testemunha 3', 'telefone_testemunha_tres');
		$data = array('name'=>'telefone_testemunha_tres','id'=>'telefone_testemunha_tres');
		echo form_input($data);	
		echo form_label('Endereço testemunha 3', 'endereco_testemunha_tres');
		$data = array('name'=>'endereco_testemunha_tres','id'=>'endereco_testemunha_tres');
		echo form_input($data);	
		echo form_label('Número testemunha 3', 'numero_testemunha_tres');
		$data = array('name'=>'numero_testemunha_tres','id'=>'numero_testemunha_tres');
		echo form_input($data);	
		echo form_label('Bairro testemunha 3', 'bairro_testemunha_tres');
		$data = array('name'=>'bairro_testemunha_tres','id'=>'bairro_testemunha_tres');
		echo form_input($data);	
		echo form_label('Cep testemunha 3', 'cep_testemunha_tres');
		$data = array('name'=>'cep_testemunha_tres','id'=>'cep_testemunha_tres');
		echo form_input($data);	
		echo form_label('Cidade testemunha 3', 'cidade_testemunha_tres');
		$data = array('name'=>'cidade_testemunha_tres','id'=>'cidade_testemunha_tres');
		echo form_input($data);	
		echo form_label('Uf testemunha 3', 'uf_testemunha_tres');
		$data = array('name'=>'uf_testemunha_tres','id'=>'uf_testemunha_tres');
		echo form_input($data);	
		//UPLOAD DE ARQUIVOS
		echo form_label('Relato dos fatos ', 'relato_fatos');
		$data = array('name'=>'relato_fatos','id'=>'relato_fatos');
		echo form_input($data);	
		echo form_label('Situação conjugal ', 'situacao_conjugal');
		$data = array('name'=>'situacao_conjugal','id'=>'situacao_conjugal');
		echo form_input($data);	
		echo form_label('Casado regime ', 'casado_regime');
		$data = array('name'=>'casado_regime','id'=>'casado_regime');
		echo form_input($data);	
		echo form_label('Possui filhos menores? ', 'possui_filhos_menores');
		$data = array('name'=>'possui_filhos_menores','id'=>'possui_filhos_menores');
		echo form_input($data);	
		echo form_label('Quantos puberes?', 'quantos_puberes');
		$data = array('name'=>'quantos_puberes','id'=>'quantos_puberes');
		echo form_input($data);	
		echo form_label('Quantos impuberes?', 'quantos_impuberes');
		$data = array('name'=>'quantos_impuberes','id'=>'quantos_impuberes');
		echo form_input($data);	
		echo form_label('Quantos maiores?', 'quantos_maiores');
		$data = array('name'=>'quantos_maiores','id'=>'quantos_maiores');
		echo form_input($data);	
		echo form_label('Possui bens? ', 'possui_bens');
		$data = array('name'=>'possui_bens','id'=>'possui_bens');
		echo form_input($data);	
		echo form_label('Quais? ', 'quais');
		$data = array('name'=>'quais','id'=>'quais');
		echo form_input($data);	
		echo form_label('Pretende pensão alimentícia? ', 'pretende_pensao_alimenticia');
		$data = array('name'=>'pretende_pensao_alimenticia','id'=>'pretende_pensao_alimenticia');
		echo form_input($data);	
		echo form_label('Para si? ', 'para_si');
		$data = array('name'=>'para_si','id'=>'para_si');
		echo form_input($data);	
		echo form_label('Para os filhos? ', 'para_os_filhos');
		$data = array('name'=>'para_os_filhos','id'=>'para_os_filhos');
		echo form_input($data);	
		echo form_label('Renda alimentante ', 'renda_alimentante');
		$data = array('name'=>'renda_alimentante','id'=>'renda_alimentante');
		echo form_input($data);	
		echo form_submit("btn_cadastro","Cadastrar");
	echo form_fieldset_close();
echo form_close();
?>
</div>