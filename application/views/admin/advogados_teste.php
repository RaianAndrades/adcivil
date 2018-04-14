
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" href="#">AdCivil</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a>
            </li>
            <li><a href="#">Contato</a>
            </li>
          </ul>
        </div>
<div class="container top"> 
	<div class="col-lg-6">
	<table class="table table-bordered responsible-table ">
		<thead>
		  <tr>	
			<th class="header">id</th>
			<th class="yellow header headerSortDown">Nome</th>	
			<th class="green header">Nº OAB</th>
			<th class="red header">Email</th>
			<th class="red header">Telefone</th>
		</tr>
		</thead>	
		<tbody>
			<?php
			foreach($advogados as $advogado) : ?>
		<?php	echo '<tr>' ?>
		<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->idAdvogado ;?></a> <?php echo '</td>' ?>
		<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->nome_advogado ;?></a> <?php echo '</td>' ?>
		<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->numero_oab ;?></a> <?php echo '</td>' ?>
		<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->email ;?></a> <?php echo '</td>' ?>
		<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->telefoneOne ;?></a> <?php echo '</td>' ?>
			<?php echo '</tr>'  ?>
			<?php endforeach; ?>
	</table>	
	</div>
</div>	
<div class="col-lg-6">
	<table class="table table-bordered responsible-table ">
	<thead>
	  <tr>	
	  	<th class="header">Excluir</th>
		<th class="header">id</th>
		<th class="yellow header headerSortDown">Nome</th>	
		<th class="green header">Nº OAB</th>
		<th class="red header">Email</th>
		<th class="red header">Telefone</th>
	</tr>
	</thead>	
	<tbody>
		<?php
		foreach($advogados as $advogado) : ?>
	<?php	echo '<tr>' ?>
<?php /*echo '<td>' ?> 
				<?php 'base_url("admin/advogados/excluir/"' . $advogado->idAdvogado
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a exclusão deste advogado?');")
				)?> <?php echo '</td>' */?>
	<a href="<?php echo base_url()."admin/editar/".$m->id; ?>">Editar</a>			
	<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->idAdvogado ;?></a> <?php echo '</td>' ?>
	<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->nome_advogado ;?></a> <?php echo '</td>' ?>
	<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->numero_oab ;?></a> <?php echo '</td>' ?>
	<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->email ;?></a> <?php echo '</td>' ?>
	<?php echo '<td>' ?>	<a href="/"><?php echo $advogado->telefoneOne ;?></a> <?php echo '</td>' ?>
		<?php echo '</tr>'  ?>
		<?php endforeach; ?>
</table>	
</div>



 <div id="content"> 
<?php
$data = array('class'=>'formcadastros','id'=>'form_categoria');
echo heading("Advogados cadastrados " . img(base_url('assets/imgs/novo.gif')),
	2, "class='divisor'");
		$array_advogados = array();
		foreach($advogados as $advogado) {
			$push = array(
				anchor(
					base_url("admin/advogados/exluir/" . $advogado->idAdvogado),
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a exclusão deste advogado?');")
				),
				anchor (
					base_url("admin/advogados/editar/" . $advogado->idAdvogado),
					img('assets/imgs/gear.gif')
				),
				$advogado->nome_advogado,
				$advogado->numero_oab,
				$advogado->email,
				$advogado->telefoneOne
			);
			array_push($array_advogados, $push);
		}
		echo "<div class='wraper_table'>";
			$this->table->set_heading('Excluir','Editar','Advogado','Nº OAB','Email','Telefone');
			$template = array('table_open'=>'<table>');
			$this->table->set_template($template);
			echo $this->table->generate($array_advogados);
		echo "</div>";

	echo heading("Cadastrar novo advogado " . img(base_url().'assets/imgs/novo.gif'), 2,
		"class='divisor'");
	echo form_open('admin/advogados/adicionar',$data);
		echo form_fieldset("Cadastrar novo advogado");
			echo form_label('Nome', 'nome_advogado');
			$data = array('name'=>'nome_advogado','id'=>'nome_advogado');
			echo form_input($data);
			echo form_label('Slug', 'slug_advogado');
			$data = array('name'=>'slug_advogado','id'=>'slug_advogado');
			echo form_input($data);
			echo form_label('Nº OAB', 'numero_oab');
			$data = array('name'=>'numero_oab','id'=>'numero_oab');
			echo form_input($data);
			echo form_label('Rg', 'rg');
			$data = array('name'=>'rg','id'=>'rg');
			echo form_input($data);
			echo form_label('Cpf', 'cpf');
			$data = array('name'=>'cpf','id'=>'cpf');
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
			echo form_label('Possui filhos? Caso sim,Quantos?', 'possui_filhos');
			$data = array('name'=>'possui_filhos','id'=>'possui_filhos');
			echo form_input($data);
			echo form_label('Nacionalidade', 'nacionalidade');
			$data = array('name'=>'nacionalidade','id'=>'nacionalidade');
			echo form_input($data);
			echo form_label('Data de nascimento', 'data_nascimento');
			$data = array('name'=>'data_nascimento','id'=>'data_nascimento');
			echo form_input($data);
			echo form_label('Possui outra graduação? Caso sim, informe qual', 'possui_outra_graduacao');
			$data = array('name'=>'possui_outra_graduacao','id'=>'possui_outra_graduacao');
			echo form_input($data);
			echo form_submit("btn_cadastro","Cadastrar");
		echo form_fieldset_close();
 	echo form_close();
 ?>

</div>
