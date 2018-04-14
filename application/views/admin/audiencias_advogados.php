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
              <a class="navbar-brand" href="<?php echo base_url()."admin/home";?>">AdCivil</a>
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
        </div>
        <div class="col-md-4 column">
            <!-- <form class="navbar-form navbar-right" role="busca" action="<?php //echo base_url();?>admin/processos/buscar" method="post">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar" name="busca" id="busca">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Pesquisar!</button>
                  </span>
              </div>
            </form> -->
        </div>
    </div>

  <div class="row clearfix">
         <div class="col-md-4 column">
            
        </div> 
        <div class="col-md-4 column">
          <h3>
            Lista de advogados presentes na audiência
          </h3>
        </div>
        <div class="col-md-4 column">
           
        </div>
    </div>

      <div class="row clearfix">
      <div class="col-md-12 column">
          <div class="col-md-2 column">
          </div>
            <div class="col-md-8 column">

          <div class=" table-responsive">    
           <table class="table table-striped table-bordered">
               <thead>
                 <tr>  
             <!--       <th class="header">Id processo</th> -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Advogado</th>
                      <th class="red header">Excluir</th>
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($audiencias_advogados as $a) : ?>
              <?php echo '<tr>' ?>
         <!--     <?php //echo '<td>' ?>  <?php //echo $a->idProcesso ;?> <?php //echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $a->idProcesso ;?>"><?php echo $a->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/advogados/ver/" . $a->idAdvogado ;?>"><?php echo $a->nome_advogado ;?></a> <?php echo '</td>' ?>

                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/audiencias_advogados/excluir/" . $a->idAudiencia_Advogado; ?>"; onclick="return confirm('Você tem certeza que deseja excluir o cliente deste processo?');" title="Excluir"><img src="<?php echo base_url();?>Assets/imgs/xis.gif"></a>  <?php echo '</td>' ?>

    
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

 <div class="row clearfix">
         <div class="col-md-4 column">
        </div> 
    <div class="col-md-4 column">
          <h3>
           Cadastrar novo advogado para a audiência
          </h3>
        </div>
        <div class="col-md-4 column">
        </div> 
   </div>     

       <?php  foreach($processos_audiencias as $p) : ?>
             <!--<?php// echo $processo->idProcesso; ?> -->
        
        <?php endforeach; ?> 

     <!--  INICIO FORMULARIO CADASTRAR NOVA AUDIENCIA-->
     <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
         <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/audiencias_advogados/adicionar_advogado_audiencia" method="post">
              
               <input class="form-control" type="hidden" required name="idAudiencia" value="<?php echo $p->idProcesso_Audiencia; ?>" /> 
           <div class="form-group">
                  <input class="form-control" type="hidden" required name="idProcesso" value="<?php echo $p->idProcesso; ?>" />
              </div> 
          <?php    $id = $p->idProcesso; ?>
              <div class="form-group">
                <label class="control-label" for="idAdvogado">Advogados:</label>
               <!--     <select class="form-control" name="idAdvogado" class="btn-slide" value="<?php// echo set_value('idAdvogado');?> " >
                        <option value=""></option>
                      <?php// $this->processos_advogados->showAdvogadosAudiencia(); ?>
                  </select>  --> 

                    <select class="form-control" name="idAdvogado" class="btn-slide" value="<?php echo set_value('idAdvogado');?>">
                          <?php foreach ($processos_advogados as $a) : ?>
                              <option value="<?php echo $a->idAdvogado ?>"><?php echo $a->nome_advogado ?> </option>
                        <?php endforeach; ?>
                       </select>  
              </div> 
               <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>   
        </div>  

          <div class="col-md-3 column">
        </div> 
      </div>
  <!--  FINAL FORMULARIO -->

</body>
</html>