<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>AdCivil, seu escritório online.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Raian de Andrades">

  <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
  <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
  <!--script src="js/less-1.3.3.min.js"></script-->
  <!--append ‘#!watch’ to the browser URL, then refresh the page. -->



<link href="<?php echo base_url();?>Assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>Assets/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo base_url();?>Assets/css/style.css" rel="stylesheet"> 
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/bootstrap.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jQuery-Mask-Plugin-master.js"></script>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">


    <script type="text/javascript" src='<?php echo base_url();?>Assets/js/jQuery-Mask-Plugin-master/jquery.mask.min.js'></script>
    <script type="text/javascript" src="Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Assets/js/scripts.js"></script>
    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  -->


  <script type="text/javascript">
              jQuery(function($){
                // $('.date').mask('11/11/1111');
                // $('.time').mask('00:00:00');
                // $('.date_time').mask('00/00/0000 00:00:00');
                $("#cep").mask('99999-999');
                // $('.phone').mask('0000-0000');
                $("#telefoneOne").mask('(99) 999999999');
                $("#telefoneTwo").mask('(99) 999999999');
                // $('.phone_us').mask('(000) 000-0000');
                // $('.mixed').mask('AAA 000-S0S');
                $('.money').mask('000.000.000.000.000,00', {reverse: true});
              });
           </script>

<!-- CPF/CNPJ NO MESMO CAMPO-->
<script type="text/javascript">
    function mascaraMutuario(o,f){
        v_obj=o
        v_fun=f
        setTimeout('execmascara()',1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function cpfCnpj(v){
        //Remove tudo o que não é dígito
        v=v.replace(/\D/g,"")
        if (v.length <= 13) { //CPF
            //Coloca um ponto entre o terceiro e o quarto dígitos
            v=v.replace(/(\d{3})(\d)/,"$1.$2")
            //Coloca um ponto entre o terceiro e o quarto dígitos
            //de novo (para o segundo bloco de números)
            v=v.replace(/(\d{3})(\d)/,"$1.$2")
            //Coloca um hífen entre o terceiro e o quarto dígitos
            v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        } else { //CNPJ
            //Coloca ponto entre o segundo e o terceiro dígitos
            v=v.replace(/^(\d{2})(\d)/,"$1.$2")
            //Coloca ponto entre o quinto e o sexto dígitos
            v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
            //Coloca uma barra entre o oitavo e o nono dígitos
            v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
            //Coloca um hífen depois do bloco de quatro dígitos
            v=v.replace(/(\d{4})(\d)/,"$1-$2")
        }
        return v
    }
</script>

</head>

<body>
<div class="container"> 
  <div class="row clearfix">
    <div class="col-md-12 column">
      <nav class="navbar navbar-default navbar-inverse" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url()."admin/home";?>">AdCivil</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
               <?php if($this->session->userdata('access')==1) { ?>
                <li><a href="<?php echo base_url()."admin/home";?>">Home</a></li>
                <li class="active"><a href="<?php echo base_url()."admin/advogados"; ?>">Advogados</a></li>
                <li><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>
                <li><a href="<?php echo base_url()."admin/usuarios"; ?>">Usuarios</a></li>
                <?php } else  { ?>
                  <li class="active"><a href="<?php echo base_url()."admin/home";?>">Home</a></li>
                <li><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>

                <?php  } ?>
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li> -->
              </ul>
            <!--   <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form> -->
              <ul class="nav navbar-nav navbar-right">
              <!--   <li><a href="#">Link</a></li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário:  <?php print_r($this->session->userdata('username')) ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url()."usuarios/logout" ?>">Sair do sistema</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>
  </div>

    <!-- CADASTRAR NOVO ADVOGADO  -->
     <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
          <h3>
            Cadastrar novo advogado
          </h3>
        </div>
        <div class="col-md-4 column">
        </div>
    </div>

   <!--  INICIO FORMULARIO -->
   <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
   <?php
    //echo form_open("admin/advogados/adicionar");
   ?>
   <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/advogados/adicionar" method="post">
      <div class="form-group">
         <label class="control-label" for="nome_advogado">Nome:</label>
         <input class="form-control" type="text" placeholder="Nome"  name="nome_advogado" value="<?php echo set_value('nome_advogado'); ?>" />
      </div>  
       <div class="form-group"> 
         <label class="control-label" for="numero_oab">Nº OAB:</label>
         <input class="form-control" type="text" placeholder="Número OAB"  name="numero_oab"  value="<?php echo set_value('numero_oab'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="rg">RG:</label>
         <input class="form-control" type="text" placeholder="RG" name="rg" required pattern="[0-9]+$"  value="<?php echo set_value('rg'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="cpf">CPF:</label>
         <input class="form-control" type="text" placeholder="CPF" name="cpf" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'  maxlength="18"  value="<?php echo set_value('cpf'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="email">Email:</label>
         <input class="form-control" type="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" />
      </div>
        <div class="form-group"> 
         <label class="control-label" for="telefoneOne">Telefone 1:</label>
         <input class="form-control" id="telefoneOne" type="text" placeholder="Telefone " name="telefoneOne"  value="<?php echo set_value('telefoneOne'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="telefoneTwo">Telefone 2:</label>
         <input class="form-control" id="telefoneTwo" type="text" placeholder="Telefone " name="telefoneTwo"  value="<?php echo set_value('telefoneTwo'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="endereco">Endereço:</label>
         <input class="form-control" type="text" placeholder="Endereço" name="endereco" value="<?php echo set_value('endereco'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="numero">Número:</label>
         <input class="form-control" type="text" placeholder="Número" name="numero" pattern="[0-9]+$" value="<?php echo set_value('numero'); ?>" />
      </div>
        <div class="form-group"> 
         <label class="control-label" for="bairro">Bairro:</label>
         <input class="form-control" type="text" placeholder="Bairro" name="bairro" value="<?php echo set_value('bairro'); ?>" />
      </div>
        <div class="form-group"> 
         <label class="control-label" for="cep">Cep:</label>
         <input class="form-control" id="cep" type="text" placeholder="Cep" name="cep" value="<?php echo set_value('cep'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="cidade">Cidade:</label>
         <input class="form-control" type="text" placeholder="Cidade" name="cidade" value="<?php echo set_value('cidade'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="uf">Uf:</label>
         <input class="form-control" type="text" placeholder="Uf" name="uf" value="<?php echo set_value('uf'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="estado_civil">Estado civil:</label>
         <input class="form-control" type="text" placeholder="Estado civil" name="estado_civil" value="<?php echo set_value('estado_civil'); ?>" />
      </div>
       <div class="form-group"> <!-- Talvez colocar Radio...-->
         <label class="control-label" for="possui_filhos">Possui filhos?:</label>
         <input class="form-control" type="text" placeholder="Digite sim ou não." name="possui_filhos" value="<?php echo set_value('possui_filhos'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="nacionalidade">Nacionalidade:</label>
         <input class="form-control" type="text" placeholder="Nacionalidade" name="nacionalidade" value="<?php echo set_value('nacionalidade'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="data_nascimento">Data de nascimento:</label>
         <input class="form-control" type="date" placeholder="Ex: 05/06/1990" name="data_nascimento" pattern="[0-9]+$" value="<?php echo set_value('data_nascimento'); ?>" />
      </div>
       <div class="form-group"> 
         <label class="control-label" for="possui_outra_graduacao">Possui outra graduação?:</label>
         <input class="form-control" type="text" placeholder="Possui outra graduação?" name="possui_outra_graduacao" value="<?php echo set_value('possui_outra_graduacao'); ?>" />
      </div>
       <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>   
   <?php
  // echo form_submit("ok","Cadastrar");
   //echo form_close();
   ?>
 </div>
  <div class="col-md-3 column">
        </div> 
  <!--  FINAL FORMULARIO -->


</body>
</html>