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
  
   <!--  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  -->   <link href="<?php echo base_url();?>Assets/css/bootstrap.min.css" rel="stylesheet">
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


    <script type="text/javascript" src='<?php echo base_url();?>Assets/js/jQuery-Mask-Plugin-master/jquery.mask.min.js'></script>
    <script type="text/javascript" src="Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Assets/js/scripts.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  


 <script type="text/javascript">
             $(document).ready(function(){
               // $('.date').mask('11/11/1111');
               // $('.time').mask('00:00:00');
               // $('.date_time').mask('00/00/0000 00:00:00');
               $('#cep').mask('99999-999');
               // $('.phone').mask('0000-0000');
               $('#telefoneOne').mask('(99) 999999999');
               // $('.phone_us').mask('(000) 000-0000');
               // $('.mixed').mask('AAA 000-S0S');
               $('#cpf').mask('999.999.999-99', {reverse: true});
               $('.money').mask('000.000.000.000.000,00', {reverse: true});
             });
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
                <li><a href="<?php echo base_url()."admin/advogados"; ?>">Advogados</a></li>
                <li class="active"><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>
                <li><a href="<?php echo base_url()."admin/usuarios"; ?>">Usuarios</a></li>
                <?php } else  { ?>
                <li><a href="<?php echo base_url()."admin/home";?>">Home</a></li>
                <li class="active"><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>

                <?php  } ?>
              </ul>
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
          <!--  <button type="button" class="btn btn-primary btn-lg btn-block"> <a href="<?php //echo base_url()."admin/clientes/cadastrar_cliente/"?>"; > Cadastrar novo cliente</a></button> -->
          <p>
                 <button class="btn btn-default btn-lg">  <a href="<?php echo base_url()."admin/clientes/cadastrar_cliente"?>"; > Cadastrar novo cliente</a> </button> 
          </p>
        </div>
        <div class="col-md-4 column">
        
        </div>
        <div class="col-md-4 column">
      

            <form class="navbar-form navbar-right" role="busca" action="<?php echo base_url();?>admin/clientes/buscar" method="post">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar" name="busca" id="busca">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Pesquisar!</button>
                      </span>
              </div>
            </form>

        </div>
    </div>
   <div class="row clearfix">
        <div class="col-md-4 column">
          <!--  <button type="button" class="btn btn-primary btn-lg btn-block"> <a href="<?php //echo base_url()."admin/clientes/cadastrar_cliente/"?>"; > Cadastrar novo cliente</a></button> -->
              
        </div>
        <div class="col-md-4 column">
          <h3>
            Lista de clientes cadastrados
          </h3>
        </div>
        <div class="col-md-4 column">

        </div>
    </div>
     <div class="row clearfix">
        <div class="col-md-2 column">
        </div>
        <div class="col-md-8 column">
           <div class=" table-responsive">    
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
             <!--       <th class="header">id Cliente</th>  -->
                    <th class="header">Nome</th>
                    <th class="header">CPF/CNPJ</th>
                    <th class="header">Rg</th>
                    <th class="header">Data de nascimento</th>
                    <th class="header">Cidade</th>
                     <th class="header">Alterar</th>
                        <th class="header">Excluir</th>
                  </tr>
                 </thead>
                <tbody>
                  <?php
                    foreach($clientes as $cliente) : ?> <!-- LISTA DE CLIENTES -->
                   <?php echo '<tr>' ?>  
               <!--     <?php// echo '<td>' ?>  <?php //echo $cliente->idCliente ;?> <?php //echo '</td>' ?>  -->
                     <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/clientes/ver/" . $cliente->idCliente ;?>"><?php echo $cliente->nome_cliente ; ?></a> <?php echo '</td>' ?>
                     <?php echo '<td>' ?>  <?php echo $cliente->doc_cliente ;?> <?php echo '</td>' ?> 
                     <?php echo '<td>' ?>  <?php echo $cliente->rg ;?> <?php echo '</td>' ?>
                     <?php echo '<td>' ?>  <?php echo date("d/m/Y", strtotime ($cliente->data_nascimento)) ;?> <?php echo '</td>' ?>
                     <?php echo '<td>' ?>  <?php echo $cliente->cidade ;?> <?php echo '</td>' ?>
                      

                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/clientes/editar/" . $cliente->idCliente; ?>"; title="Alterar"><img src=<?php echo base_url()."Assets/imgs/gear.gif"; ?>></a> <?php echo '</td>' ?>
                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/clientes/excluir/" . $cliente->idCliente; ?>"; onclick="return confirm('Você tem certeza que deseja excluir este cliente?');" title="Excluir"><img src=<?php echo base_url()."Assets/imgs/xis.gif"; ?>></a> <?php echo '</td>' ?>

                       
                <?php echo '</tr>'  ?>
                <?php endforeach; ?>
            </tbody>
            </table>  
           </div>
           <?php echo !empty($paginacao) ? $paginacao : ''; ?>     
        </div>
        <div class="col-md-2 column">
        </div>
     </div> 
</div> 
        
</body>
</html>     