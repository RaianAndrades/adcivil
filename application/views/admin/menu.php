<div id="top">
	<span class='saudacao'>
		Seja bem vindo:
		<?php
		//	echo ucwords($this->session->userdata('usuario'));
		?>
	</span>
	<div id="menu">
		<?php
			$links = array(
				anchor(base_url(),"Home"),
				anchor(base_url("admin/Advogados"),"Advogados"),
				anchor(base_url("admin/clientes"),"Clientes"),
				anchor(base_url("admin/processos"),"Processos"),
				anchor(base_url("admin/audiencias"),"Audiências"),
				anchor(base_url("admin/relatorios"),"Relatórios"),
			);	
			echo ul($links);
		?>
	</div>
</div>	