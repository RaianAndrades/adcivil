<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>AdCivil, seu escritório online.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
  <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
  <!--script src="js/less-1.3.3.min.js"></script-->
  <!--append ‘#!watch’ to the browser URL, then refresh the page. -->
  
    <link href="<?php echo base_url();?>Assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>Assets/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo base_url();?>Assets/css/style.css" rel="stylesheet"> 
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/bootstrap.js"></script>

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
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
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
  <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
          <h3>
            Informações do advogado
          </h3>
        </div>
        <div class="col-md-4 column">
        </div>
    </div>
     <div class="row clearfix">

     </div> 
      <!--  INICIO LISTA -->
   <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
		<?php 

    foreach($advogados as $advogado) : ?> <!-- INFORMAÇÕES DO ADVOGADO -->

    <ul class="list-group">
                  <!-- <li class="list-group-item">Id Advogado: <?php// echo $advogado->idAdvogado; ?></li> -->
                  <li class="list-group-item">Nome: <?php echo $advogado->nome_advogado; ?></li>
                  <li class="list-group-item">Número OAB: <?php echo $advogado->numero_oab; ?></li>
                  <li class="list-group-item">Rg: <?php echo $advogado->rg; ?></li>
                  <li class="list-group-item">Cpf: <?php echo $advogado->cpf; ?></li>
                  <li class="list-group-item">Email: <?php echo $advogado->email; ?></li>
                  <li class="list-group-item">Telefone 1: <?php echo $advogado->telefoneOne; ?></li>
                  <li class="list-group-item">telefone 2: <?php echo $advogado->telefoneTwo; ?></li>
                  <li class="list-group-item">Endereço: <?php echo $advogado->endereco; ?></li>
                  <li class="list-group-item">Número: <?php echo $advogado->numero; ?></li>
                  <li class="list-group-item">Bairro: <?php echo $advogado->bairro; ?></li>
                  <li class="list-group-item">Cep: <?php echo $advogado->cep; ?></li>
                  <li class="list-group-item">Cidade: <?php echo $advogado->cidade; ?></li>
                  <li class="list-group-item">Uf: <?php echo $advogado->uf; ?></li>
                  <li class="list-group-item">Estado civil: <?php echo $advogado->estado_civil; ?></li>
                  <li class="list-group-item">Possui filhos? <?php echo $advogado->possui_filhos; ?></li>
                  <li class="list-group-item">Nacionalidade: <?php echo $advogado->nacionalidade; ?></li>
                  <li class="list-group-item">Data de nascimento: <?php echo date("d/m/Y", strtotime ($advogado->data_nascimento)); ?></li>
                  <li class="list-group-item">Possui outra graduação?<?php echo $advogado->possui_outra_graduacao; ?></li>
   </ul>  

    <?php endforeach; ?>    
        <input type="button" value="Voltar" onClick="history.go(-1)">

  </div>
   <div class="col-md-3 column">
        </div> 

</div>
</body>
</html5>

