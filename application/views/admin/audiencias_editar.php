<div id="content">
	<?php
echo heading("Alterar audiência " . img(base_url().'assets/imgs/novo,gif'), 2,
	"class='divisor'");
$data = array('class'=>'formcadastros','id'=>'form_categoria');
$hidden = array('idAudiencia' => $idAudiencia);
	echo form_open('admin/audiencias/gravar_alteracao', $data, $hidden);
		echo form_fieldset("Alterar audiência");
		echo form_label('Slug', 'slug_audiencia');
		$data = array('name'=>'slug_audiencia','id'=>'slug_audiencia', 'value'=>$slug_audiencia);
		echo form_input($data);	
		echo form_label('Nº processo', 'idNumeroProcesso');
		$data = array('name'=>'idNumeroProcesso','id'=>'idNumeroProcesso', 'value'=>$idNumeroProcesso);
		echo form_input($data);	
		echo form_label('Data', 'data');
		$data = array('name'=>'data','id'=>'data', 'value'=>$data);
		echo form_input($data);	
		echo form_label('Horário', 'horario');
		$data = array('name'=>'horario','id'=>'horario', 'value'=>$horario);
		echo form_input($data);	
		echo form_label('Cliente', 'idClienteAudiencia');
		$data = array('name'=>'idClienteAudiencia','id'=>'idClienteAudiencia', 'value'=>$idClienteAudiencia);
		echo form_input($data);	
		echo form_label('Advogado 1', 'idAdvogadoUm');
		$data = array('name'=>'idAdvogadoUm','id'=>'idAdvogadoUm', 'value'=>$idAdvogadoUm);
		echo form_input($data);	
		echo form_label('Advogado 2', 'idAdvogadoDois');
		$data = array('name'=>'idAdvogadoDois','id'=>'idAdvogadoDois', 'value'=>$idAdvogadoDois);
		echo form_input($data);	
		echo form_label('Vara', 'vara');
		$data = array('name'=>'vara','id'=>'vara', 'value'=>$vara);
		echo form_input($data);	
		echo form_label('Tipo de audiência', 'tipo_audiencia');
		$data = array('name'=>'tipo_audiencia','id'=>'tipo_audiencia', 'value'=>$tipo_audiencia);
		echo form_input($data);	
		echo form_label('Contato cliente', 'contato_cliente');
		$data = array('name'=>'contato_cliente','id'=>'contato_cliente', 'value'=>$contato_cliente);
		echo form_input($data);	
		echo form_label('Observações', 'observacao');
		$data = array('name'=>'observacao','id'=>'observacao', 'value'=>$observacao);
		echo form_input($data);	
		echo form_submit("btn_cadastro", "Alterar");
		echo form_fieldset_close();
	echo form_close();
?>
</div>	