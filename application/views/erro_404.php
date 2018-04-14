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



    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
    rel="stylesheet">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->

    
 <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"> -->
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
                <li class="active"><a href="<?php echo base_url()."admin/home";?>">Home</a></li>
                <li><a href="<?php echo base_url()."admin/advogados"; ?>">Advogados</a></li>
                <li><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>
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
  <div class="row clearfix">
        <div class="col-md-2 column">
            
        </div>
        <div class="col-md-8 column">
        </hr>
           <h3>Ops. :( </h3>
           <h3> A página solicitada não foi encontrada</h3>
           <a href="javascript:history.go(-1)">Voltar</a> | 
        </div>
          <div class="col-md-2 column">
            
        </div>
      

    </div>
 


     <div class="row clearfix">
      <div class="col-md-2 column"></div>
        <div class="col-md-4 column">
            
          <!--   <button>  <a href="<?php //echo base_url()."admin/advogados/cadastrar_advogado"?>"; > Cadastrar novo advogado</a> </button>  -->
        </div>
          <div class="col-md-4 column">
            <!-- <form class="navbar-form navbar-right" role="busca" action="<?php// echo base_url();?>admin/advogados/buscar" method="post">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar" name="busca" id="busca">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Pesquisar!</button>
                      </span>

              </div>
            </form> -->
        </div>
        <div class="col-md-2 column"></div>

    </div>

</body>
</html>