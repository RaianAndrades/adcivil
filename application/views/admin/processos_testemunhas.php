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
                $("#cpf").mask('999.999.999-99');
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
            <!-- <form class="navbar-form navbar-right" role="busca" action="<?php //echo base_url();?>admin/processos/buscar" method="post">
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
            Lista de testemunhas cadastradas no processo
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
                    <th class="green header">Nome da testemunha</th>
                     <th class="red header">Telefone</th>
                      <th class="red header">Cidade</th>
                      <th class="red header">Alterar</th>
                      <th class="red header">Excluir</th>
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_testemunhas as $processo) : ?>  <!-- LISTA DE TESTEMUNHAS NO PROCESSO -->
              <?php echo '<tr>' ?>
        <!--      <?php// echo '<td>' ?>  <?php// echo $processo->idProcesso ;?> <?php// echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $processo->idProcesso ;?>"><?php echo $processo->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_testemunhas/ver/" . $processo->idProcesso_testemunha ;?>"><?php echo $processo->nome_testemunha ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <?php echo $processo->telefoneOne ;?> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <?php echo $processo->cidade ;?> <?php echo '</td>' ?>
        
                       <!--  <button class="btn btn-mini btn-info" type="button"><i class="icon-edit icon-white"> -->

                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_testemunhas/editar/" . $processo->idProcesso_testemunha; ?>"; title="Alterar"><img src="<?php echo base_url();?>Assets/imgs/gear.gif"></a>  <?php echo '</td>' ?> 
                            <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_testemunhas/excluir/" . $processo->idProcesso_testemunha; ?>"; onclick="return confirm('Você tem certeza que deseja excluir a testemunha deste processo?');" title="Excluir"><img src="<?php echo base_url();?>Assets/imgs/xis.gif"></a>  <?php echo '</td>' ?>

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
         <div class="col-md-3 column">
        </div> 
    <div class="col-md-4 column">
          <h3>
           Cadastrar testemunha no processo
          </h3>
        </div>
         <div class="col-md-3 column">
        </div> 
  </div>

       <?php  foreach($processos as $p) : ?>
             <!--<?php// echo $processo->idProcesso; ?> -->
        <?php endforeach; ?> 

     <!--  INICIO FORMULARIO CADASTRAR TESTEMUNHAS -->
     <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
         <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/processos_testemunhas/adicionar_testemunha" method="post">
              
           <div class="form-group">
                  <input class="form-control" type="hidden" required name="idProcesso" value="<?php echo $p->idProcesso; ?>" />
              </div> 

              <div class="form-group">
                 <label class="control-label" for="nome_testemunha">Nome testemunha:</label>
                 <input class="form-control" type="text" placeholder="Nome" required name="nome_testemunha" value="<?php echo set_value('nome_testemunha'); ?>" />
             </div>  

              <div class="form-group">
                 <label class="control-label" for="email">Email:</label>
                 <input class="form-control" type="text" placeholder="Email"  name="email" value="<?php echo set_value('email'); ?>" />
             </div>  

             <div class="form-group">
                 <label class="control-label" for="telefoneOne">Telefone 1:</label>
                 <input class="form-control" id="telefoneOne" type="text" placeholder="Telefone "  name="telefoneOne" value="<?php echo set_value('telefoneOne'); ?>" />
             </div>  

            <div class="form-group">
                 <label class="control-label" for="telefoneTwo">Telefone 2:</label>
                 <input class="form-control" id="telefoneTwo" type="text" placeholder="Telefone " name="telefoneTwo" value="<?php echo set_value('telefoneTwo'); ?>" />
             </div>  

              <div class="form-group">
                 <label class="control-label" for="endereco">Endereço:</label>
                 <input class="form-control" type="text" placeholder="Endereço"  name="endereco" value="<?php echo set_value('endereco'); ?>" />
             </div> 

               <div class="form-group">
                 <label class="control-label" for="numero">Número:</label>
                 <input class="form-control" type="text" placeholder="Número"  name="numero" value="<?php echo set_value('numero'); ?>" />
             </div> 
             
             <div class="form-group">
                 <label class="control-label" for="bairro">Bairro:</label>
                 <input class="form-control" type="text" placeholder="bairro"  name="bairro" value="<?php echo set_value('bairro'); ?>" />
             </div> 

             <div class="form-group">
                 <label class="control-label" for="cep">Cep:</label>
                 <input class="form-control" id="cep" type="text" placeholder="cep"  name="cep" value="<?php echo set_value('cep'); ?>" />
             </div> 

             <div class="form-group">
                 <label class="control-label" for="cidade">Cidade:</label>
                 <input class="form-control" type="text" placeholder="cidade" name="cidade" value="<?php echo set_value('cidade'); ?>" />
             </div> 

             <div class="form-group">
                 <label class="control-label" for="uf">Uf:</label>
                 <input class="form-control" type="text" placeholder="uf"  name="uf" value="<?php echo set_value('uf'); ?>" />
             </div>
             
               <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>   
        </div>  

          <div class="col-md-3 column">
        </div> 
  <!--  FINAL FORMULARIO -->

</body>
</html>