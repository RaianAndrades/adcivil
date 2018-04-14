<?php
$data = array('class'=>'formlogin','id'=>'formlogin');
echo form_open('admin/home/login',$data);
	echo form_fieldset("Login");
		echo form_label('Usuário', 'usuario');
		$data = array('name'=>'usuario','id'=>'usuario');
		echo form_input($data);
		echo form_label('Senha', 'senha');
		$data = array('name'=>'senha','id'=>'senha');
		echo form_password($data);
		echo form_submit("btn_login", "Fazer login");
	echo form_fieldset_close();
echo form_close();
?>