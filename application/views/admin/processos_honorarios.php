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
            Valor do honorário
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
                   <!-- <th class="header">Id processo</th> -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Valor</th>
                    <!--  <th class="red header">Alterar</th> -->
                
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos as $processo) : ?> <!-- VALOR DO HONORARIO -->
              <?php echo '<tr>' ?>
                                                                                                                                                     
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $processo->idProcesso ;?>"><?php echo $processo->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $processo->idProcesso ;?>"><?php echo "R$ " . number_format($processo->honorarios,2,',','.') ;?></a> <?php echo '</td>' ?>
         
        
                       <!--  <button class="btn btn-mini btn-info" type="button"><i class="icon-edit icon-white"> -->
                            

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
            Lista de pagamentos 
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
                   <!-- <th class="header">Id processo</th> -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Valor do pagamento</th>
                    <th class="green header">Data</th>
                    <!--  <th class="red header">Alterar</th> -->
                      <th class="red header">Excluir</th>
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_honorarios as $processo) : ?> <!-- LISTA DE PAGAMENTOS FEITOS -->
              <?php echo '<tr>' ?>                                                                                                                                      
     
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $processo->idProcesso ;?>"><?php echo $processo->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_honorarios/ver/" . $processo->idProcesso_honorario ;?>"><?php echo "R$ " . number_format($processo->valor_pago,2,',','.') ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <?php echo date("d/m/Y", strtotime ( $processo->data)) ;?> <?php echo '</td>' ?>
         
        
                       <!--  <button class="btn btn-mini btn-info" type="button"><i class="icon-edit icon-white"> -->
                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_honorarios/excluir/" . $processo->idProcesso_honorario; ?>"; onclick="return confirm('Você tem certeza que deseja excluir este pagamento?');" title="Excluir"><img src="<?php echo base_url();?>Assets/imgs/xis.gif"></a>  <?php echo '</td>' ?>

                <?php echo '</tr>'  ?>
                <?php endforeach; ?>
            </tbody>
            <thead>
                 <tr>  
                   <!-- <th class="header">Id processo</th> -->
                   
                    <th class="green header">total</th>
                    <!--  <th class="red header">Alterar</th> -->
                       <?php
                      foreach($processosHonorarios as $p) : ?>
                  
                                                                            
                    <?php echo '<th class="green header">' ?><?php echo "R$ " . number_format($p->SOMA,2,',','.') ;?><?php echo '</th>' ?>

                    <?php echo '<th class="green header">' ?><?php echo '</th>'; ?>
                    <?php echo '<th class="green header">' ?><?php echo '</th>'; ?>
                <?php endforeach; ?>
                      
                 </tr>
              </thead>  
              <tbody>
             
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

          <div class=" table-responsive">    
           <table class="table table-striped table-bordered">
               <thead>
                 <tr>  
                   <!-- <th class="header">Id processo</th> -->
                   
                    <th class="green header">Restante a pagar</th>
                    <!--  <th class="red header">Alterar</th> -->
                      
                 </tr>
              </thead>  
              <tbody>
                 <?php
                foreach($processos as $processo) : ?>
                <?php
                foreach($processosHonorarios as $p) : ?>
              <?php echo '<tr>' ?>
     
             
         
           <?php $total = $processo->honorarios - $p->SOMA ;?>  <!-- VALOR RESTANTE A PAGAR  -->

              <?php if($total<0) { ?>

              <?php echo '<td>' ?> <?php echo "Credito para o cliente receber R$ " . number_format($total,2,',','.');?>  <?php echo '</td>' ?>

              <?php } else { ?>

              <?php echo '<td>' ?> <?php echo "R$ " . number_format($total,2,',','.');?>  <?php echo '</td>' ?>
          
              <?php } ?>
                


                <?php echo '</tr>'  ?>
                <?php endforeach; ?>
                 <?php endforeach; ?>
            </tbody>
            </table>  
          </div>
           <?php echo !empty($paginacao) ? $paginacao : ''; ?>   
          </div>
          <div class="col-md-4 column">
          </div>
    </div>  



 <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
    <div class="col-md-4 column">
          <h3>
           Cadastrar pagamento de honorário
          </h3>
        </div>
         <div class="col-md-3 column">
        </div> 
  </div>

       <?php  foreach($processos as $p) : ?>
             <!--<?php// echo $processo->idProcesso; ?> -->
        <?php endforeach; ?> 

     <!--  INICIO FORMULARIO CADASTRAR NOVO PAGAMENTO-->
     <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
         <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/processos_honorarios/adicionar_honorario" method="post">
              
           <div class="form-group">
                  <input class="form-control" type="hidden" required name="idProcesso" value="<?php echo $p->idProcesso; ?>" />
              </div> 
               <div class="form-group">
                <label class="control-label" for="data">Data:</label>
                <input class="form-control" type="date" placeholder="Data" name="data" value="<?php echo set_value('data'); ?>" />
             </div>  

               <div class="form-group">
                 <label class="control-label" for="valor_pago">Valor pagamento:</label>
                 <input class="form-control" type="text" placeholder="Utilize ponto ao invés de virgula. Ex: 1400.00" required name="valor_pago" value="<?php echo set_value('valor_pago'); ?>" />
             </div>
             
               <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>   
        </div>  

          <div class="col-md-3 column">
        </div> 
  <!--  FINAL FORMULARIO -->

</body>
</html>