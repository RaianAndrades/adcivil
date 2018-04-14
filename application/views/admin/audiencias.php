<div id="content">
<?php
$data = array('class'=>'formcadastros','id'=>'form_categoria');
echo heading("Audiências cadastradas " . img(base_url('assets/imgs/novo.gif')),
	2, "class='divisor'");
		$array_audiencias = array();
		foreach($audiencias as $audiencia) {
			$push = array(
				anchor(
					base_url("admin/audiencias/excluir/" . $audiencia->idAudiencia),
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a exclusão desta audiência?');")
				),
				anchor(
					base_url("admin/audiencias/editar/" . $audiencia->idAudiencia),
					img('assets/imgs/gear.gif')
				),
				$audiencia->idNumeroProcesso,
				$audiencia->data,
				$audiencia->horario,
				$audiencia->idClienteAudiencia,
				$audiencia->idAdvogadoUm,
				$audiencia->idAdvogadoDois,
			);
			array_push($array_audiencias, $push);
		}
	echo "<div class='wraper_table'>";
		$this->table->set_heading('Excluir', 'Editar', 'Nº processo', 'Data', 'Horário', 'Cliente', 'Advogado 1', 'Advogado 2');
		$template = array('table_open'=>'<table>');
		$this->table->set_template($template);
		echo $this->table->generate($array_audiencias);
	echo "</div>"; 
echo heading("Cadastrar nova audiência " . img(base_url().'assets/imgs/novo,gif'), 2,
	"class='divisor'");
echo form_open('admin/audiencias/adicionar', $data);
	echo form_fieldset("Cadastrar nova audiência");
		echo form_label('Slug', 'slug_audiencia');
		$data = array('name'=>'slug_audiencia','id'=>'slug_audiencia');
		echo form_input($data);	
		echo form_label('Nº processo', 'idNumeroProcesso');
		$data = array('name'=>'idNumeroProcesso','id'=>'idNumeroProcesso');
		echo form_input($data);	
		echo form_label('Data', 'data');
		$data = array('name'=>'data','id'=>'data');
		echo form_input($data);	
		echo form_label('Horário', 'horario');
		$data = array('name'=>'horario','id'=>'horario');
		echo form_input($data);	
		echo form_label('Cliente', 'idClienteAudiencia');
		$data = array('name'=>'idClienteAudiencia','id'=>'idClienteAudiencia');
		echo form_input($data);	
		echo form_label('Advogado 1', 'idAdvogadoUm');
		$data = array('name'=>'idAdvogadoUm','id'=>'idAdvogadoUm');
		echo form_input($data);	
		echo form_label('Advogado 2', 'idAdvogadoDois');
		$data = array('name'=>'idAdvogadoDois','id'=>'idAdvogadoDois');
		echo form_input($data);	
		echo form_label('Vara', 'vara');
		$data = array('name'=>'vara','id'=>'vara');
		echo form_input($data);	
		echo form_label('Tipo de audiência', 'tipo_audiencia');
		$data = array('name'=>'tipo_audiencia','id'=>'tipo_audiencia');
		echo form_input($data);	
		echo form_label('Contato cliente', 'contato_cliente');
		$data = array('name'=>'contato_cliente','id'=>'contato_cliente');
		echo form_input($data);	
		echo form_label('Observações', 'observacao');
		$data = array('name'=>'observacao','id'=>'observacao');
		echo form_input($data);	
		echo form_submit("btn_cadastro", "Cadastrar");
	echo form_fieldset_close();
echo form_close();
?>
</div>