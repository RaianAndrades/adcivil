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
              <a class="navbar-brand" href="#">AdCivil</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
               <?php if($this->session->userdata('access')==1) { ?>
                <li><a href="<?php echo base_url()."admin/home";?>">Home</a></li>
                <li><a href="<?php echo base_url()."admin/advogados"; ?>">Advogados</a></li>
                <li><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li class="active"><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>
                <li><a href="<?php echo base_url()."admin/usuarios"; ?>">Usuarios</a></li>
                <?php } else  { ?>
                <li><a href="<?php echo base_url()."admin/home";?>">Home</a></li>
                <li><a href="<?php echo base_url()."admin/clientes"; ?>">Clientes</a></li>
                <li class="active"><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>

                <?php  } ?>
               </ul>
              <ul class="nav navbar-nav navbar-right">
              <!--   <li><a href="#">Link</a></li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário: <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Sair do sistema</a></li>
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
        </div>
        <div class="col-md-4 column">
           <!--  <form class="navbar-form navbar-right" role="busca" action="<?php// echo base_url();?>admin/processos/buscar" method="post">
              <div class="form-group">
                <label class="control-label" for="busca">Buscar:</label>
                  <input type="text" class="form-control" placeholder="Buscar" name="busca" id="busca">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
            </form> -->
        </div>
    </div>
  <div class="row clearfix">
         <div class="col-md-4 column">
            
        </div> 
        <div class="col-md-4 column">
          <h3>
            Lista de documentos cadastrados no processo
          </h3>
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
                   <!-- <th class="header">Id processo</th>  -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Baixar imagem</th>
                     <!-- <th class="red header">Alterar</th> -->
                      <th class="red header">Excluir</th>
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_documentos as $processo) : ?>
              <?php echo '<tr>' ?>
          <!--    <?php// echo '<td>' ?>  <?php //echo $processo->idProcesso ;?> <?php// echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $processo->idProcesso ;?>"><?php echo $processo->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_documentos/baixar_documento/" . $processo->documento ;?>"><?php echo $processo->documento ;?></a> <?php echo '</td>' ?>
        
                       <!--  <button class="btn btn-mini btn-info" type="button"><i class="icon-edit icon-white"> -->

                     <!--        <?php /*echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_clientes/editar/" . $processo->idProcesso_Cliente; ?>"; title="Alterar"><img src="../Assets/imgs/gear.gif"></a>  <?php echo '</td>'*/ ?> -->
                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_documentos/excluir/" . $processo->idProcesso_Documento; ?>"; onclick="return confirm('Você tem certeza que deseja excluir o documento deste processo?');" title="Excluir"><img src="<?php echo base_url();?>Assets/imgs/xis.gif"></a>  <?php echo '</td>' ?>

    
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

<div class="row clearfix">
  <div class="col-md-4 column"></div>
    <div class="col-md-4 column">
          <h3>
           Cadastrar novo documento no processo
          </h3>
        </div>

       <?php  foreach($processos as $p) : ?>
             <!--<?php// echo $processo->idProcesso; ?> -->
        <?php endforeach; ?> 
        <div class="col-md-4 column"></div>
  </div>      

  <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
      <div class=" table-responsive">    
           <table class="table table-striped table-bordered">
               <thead>
                 <tr>  
                    <th class="header">Formatos de imagem aceitos: gif | jpg | png </th>
                 </tr>
              </thead>  
            </table>  
          </div>
  </div>        
     <div class="col-md-3 column">
        </div> 
      </div>

     <!--  INICIO FORMULARIO -->
     <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
          <?php // echo $error;?>
          <form action="<?php echo base_url();?>admin/Processos_documentos/adicionar_documento" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                
            <div class="form-group">
                <input class="form-control" type="hidden" required name="idProcesso" value="<?php echo $p->idProcesso; ?>" />
             </div> 
                <input type="file" name="userfile" size="20" />

                <br /><br />

                        <input type="submit" value="Salvar" />
            </form>
        </div>  

          <div class="col-md-3 column">
        </div> 
  <!--  FINAL FORMULARIO -->

</body>
</html>