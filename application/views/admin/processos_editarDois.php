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
 

    <!-- CADASTRAR NOVO PROCESSO  -->
     <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
          <h3>
            Alteração de processo
          </h3>
        </div>
        <div class="col-md-4 column">
        </div>
    </div>

     

      <?php   // echo  $getProcesso->idProcesso; ?>

          <?php  foreach($processosEditar as $p) : ?>
             <?php //echo $p['idProcesso']; ?>
        <?php endforeach; ?>
     <!--  INICIO FORMULARIO ALTERAR PROCESSO -->
     <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">
         <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/processos/gravar_alteracao" method="post">
              <div class="form-group">
                  <input class="form-control" type="hidden" required name="idProcesso" value="<?php echo $p->idProcesso; ?>" />
              </div>  
               <div class="form-group">
                 <label class="control-label" for="numero_processo">Número do processo:</label>
                 <input class="form-control" type="text" placeholder="Número do processo" name="numero_processo"  value="<?php echo $p->numero_processo; ?>" />
              </div>  
               <div class="form-group">
                 <label class="control-label" for="data_abertura">Data de abertura:</label>
                 <input class="form-control" type="date" placeholder="Data de abertura" name="data_abertura"  value="<?php echo $p->data_abertura; ?>" />
              </div> 
               <div class="form-group">
                 <label class="control-label" for="situacao_cliente">Situação do cliente:</label>
                 <input class="form-control" type="text" placeholder="Situação do cliente" name="situacao_cliente"  value="<?php echo $p->situacao_cliente; ?>" />
              </div>   


              <div class="form-group">
                 <label class="control-label" for="tipo_de_acao">Tipo de ação:</label>
                 <input class="form-control" type="text" placeholder="Tipo de ação" name="tipo_de_acao"  value="<?php echo $p->tipo_de_acao; ?>" />
              </div>  

              <!-- UPLOAD DE IMAGENS -->

              <div class="form-group">
                 <label class="control-label" for="relato_fatos">Relato dos fatos:</label>
                 <textarea class="form-control" type="text" placeholder="Relatos dos fatos" name="relato_fatos" value="<?php echo $p->relato_fatos; ?>"><?php echo $p->relato_fatos; ?> </textarea>
              </div>  


              <!-- INFORMAÇÕES FINANCEIRO-->

              <div class="panel panel-default">
                  <div class="panel-heading">Financeiro</div>
                  <div class="panel-body">,
                   
              <div class="form-group">
                 <label class="control-label" for="valor_causa">Valor da causa:</label>
                 <input class="form-control" type="text" placeholder="Valor da causa" name="valor_causa" value="<?php echo $p->valor_causa; ?>" />
              </div>  

              <div class="form-group">
                 <label class="control-label" for="custas">Custas:</label>
                 <input class="form-control" type="text" placeholder="Custas" name="custas" value="<?php echo $p->custas; ?>" />
              </div>  

              <div class="form-group">
                 <label class="control-label" for="honorarios">Honorários:</label>
                 <input class="form-control" type="text" placeholder="Honorários" name="honorarios" value="<?php echo $p->honorarios; ?>" />
              </div>  

              <div class="form-group">
                 <label class="control-label" for="outras_despesas">Outras despesas:</label>
                 <input class="form-control" type="text" placeholder="Outras despesas" name="outras_despesas" value="<?php echo $p->outras_despesas; ?>" />
              </div>  
                  </div> <!-- FINAL INFORMAÇÕES FINANCEIRO -->
                </div>


              <!-- OUTRAS INFORMAÇÕES-->
              <div class="panel panel-default">
                  <div class="panel-heading">Outras informações</div>
                  <div class="panel-body">

              <div class="form-group">
                 <label class="control-label" for="situacao_conjugal">Situação conjugal:</label>
                 <input class="form-control" type="text" placeholder="Situação conjugal" name="situacao_conjugal" value="<?php echo $p->situacao_conjugal; ?>" />
              </div>  
              <div class="form-group">
                 <label class="control-label" for="casado_regime">Casado regime:</label>
                 <input class="form-control" type="text" placeholder="Casado regime" name="casado_regime" value="<?php echo $p->casado_regime; ?>" />
              </div> 
              <div class="form-group">
                 <label class="control-label" for="possui_filhos_menores">Possui filhos menores?:</label>
                 <input class="form-control" type="text" placeholder="Possui filhos menores?" name="possui_filhos_menores" value="<?php echo $p->possui_filhos_menores; ?>" />
              </div>  
               <div class="form-group">
                 <label class="control-label" for="quantos_puberes">Quantos púberes?:</label>
                 <input class="form-control" type="text" placeholder="Quantos púberes?" name="quantos_puberes" value="<?php echo $p->quantos_puberes; ?>" />
              </div>   
                 <div class="form-group">
                 <label class="control-label" for="quantos_impuberes">Quantos impúberes?:</label>
                 <input class="form-control" type="text" placeholder="Quantos impúberes?" name="quantos_impuberes" value="<?php echo $p->quantos_impuberes; ?>" />
              </div> 
              <div class="form-group">
                 <label class="control-label" for="quantos_maiores">Quantos maiores?:</label>
                 <input class="form-control" type="text" placeholder="Quantos maiores?" name="quantos_maiores" value="<?php echo $p->quantos_maiores; ?>" />
              </div>     
                <div class="form-group">
                 <label class="control-label" for="possui_bens">Possui bens?:</label>
                 <input class="form-control" type="text" placeholder="Possui bens?" name="possui_bens" value="<?php echo $p->possui_bens; ?>" />
              </div>     
                <div class="form-group">
                 <label class="control-label" for="quais">Quais?:</label>
                 <input class="form-control" type="text" placeholder="Quais?" name="quais" value="<?php echo $p->quais; ?>" />
              </div>     
                <div class="form-group">
                 <label class="control-label" for="pretende_pensaoalimenticia">Pretende pensão alimenticia?:</label>
                 <input class="form-control" type="text" placeholder="Pretende pensão alimenticia?" name="pretende_pensao_alimenticia" value="<?php echo $p->pretende_pensao_alimenticia; ?>" />
              </div>    
                <div class="form-group">
                 <label class="control-label" for="para_si">Para si?:</label>
                 <input class="form-control" type="text" placeholder="Para si?" name="para_si" value="<?php echo $p->para_si; ?>" />
              </div>  
                <div class="form-group">
                 <label class="control-label" for="para_os_filhos">Para os filhos?:</label>
                 <input class="form-control" type="text" placeholder="Para os filhos?" name="para_os_filhos" value="<?php echo $p->para_os_filhos; ?>" />
              </div>    
              <div class="form-group">
                 <label class="control-label" for="renda_alimentante">Renda alimentante?:</label>
                 <input class="form-control" type="text" placeholder="Renda alimentante" name="renda_alimentante" value="<?php echo $p->renda_alimentante; ?>" />
              </div>      
               <div class="form-group">
                 <label class="control-label" for="observacoes">Observações:</label>
                 <textarea class="form-control" type="text" placeholder="Observações" name="observacoes" value="<?php echo $p->observacoes; ?>"><?php echo $p->observacoes; ?></textarea>
              </div> 
               <button type="submit" class="btn btn-default">Alterar</button>
        </form>   
        </div>  
      </div>


          <div class="col-md-3 column">
        </div> 
  <!--  FINAL FORMULARIO -->


</body>
</html>