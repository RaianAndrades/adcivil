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
  <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
          <h3>
            Informações do processo
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

		foreach($processos as $processo) : ?>  <!-- INFORMAÇÕES DO PROCESSO -->

      <ul class="list-group">
          <!-- <li class="list-group-item">Id Processo: <?php// echo $processo->idProcesso; ?></li> -->
          <li class="list-group-item">Número processo: <?php echo $processo->numero_processo; ?></li>
          <li class="list-group-item">Data de abertura: <?php echo date("d/m/Y", strtotime ($processo->data_abertura)); ?></li>
          <li class="list-group-item">Situação do cliente: <?php echo $processo->situacao_cliente; ?></li>
          <li class="list-group-item">Relato dos fatos: <?php echo $processo->relato_fatos; ?></li>
<div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
           <div class="col-md-6 column">
          <h3>
            Clientes do processo
          </h3>
        </div>
         <div class="col-md-3 column">
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
                    <!-- <th class="header">Id processo</th>   -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Cliente</th>
                    <th class="green header">Cidade</th>
                   
                   
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_clientes as $p) : ?> <!-- INFORMAÇÕES DOS CLIENTES -->
              <?php echo '<tr>' ?>
             <!--  <?php// echo '<td>' ?>  <?php// echo $p->idProcesso ;?> <?php// echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $p->idProcesso ;?>"><?php echo $p->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/clientes/ver/" . $p->idCliente ;?>"><?php echo $p->nome_cliente ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <?php echo $p->cidade ;?> <?php echo '</td>' ?>
                      
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
           <div class="col-md-6 column">
          <h3>
            Advogados do processo
          </h3>
        </div>
         <div class="col-md-3 column">
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
                  <!--  <th class="header">Id processo</th>  INFORMAÇÕES DOS ADVOGADOS -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Advogado</th>
                    <th class="green header">Cidade</th>
                  
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_advogados as $advogado) : ?>
              <?php echo '<tr>' ?>
             <!-- <?php// echo '<td>' ?>  <?php// echo $advogado->idProcesso ;?> <?php// echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $advogado->idProcesso ;?>"><?php echo $advogado->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/advogados/ver/" . $advogado->idAdvogado ;?>"><?php echo $advogado->nome_advogado ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <?php echo $advogado->cidade ;?> <?php echo '</td>' ?>
               
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
             <div class="col-md-3 column">
        </div> 
           <div class="col-md-6 column">
          <h3>
            Outra(s) partes do processo
          </h3>
        </div>
         <div class="col-md-3 column">
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
                  <!--  <th class="header">Id processo</th>  INFORMAÇÕES DAS OUTRAS PARTES -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Nome outra parte</th>
                    <th class="green header">Telefone</th>
                    <th class="green header">Cidade</th>
                                     </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_outra_parte as $outra) : ?>
              <?php echo '<tr>' ?>
         <!--     <?php// echo '<td>' ?>  <?php //echo $outra->idProcesso ;?> <?php //echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $outra->idProcesso ;?>"><?php echo $processo->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_outra_parte/ver/" . $outra->idProcesso_Outra_Parte ;?>"><?php echo $outra->nome_outra_parte ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <?php echo $outra->telefoneOne ;?> <?php echo '</td>' ?>
               <?php echo '<td>' ?>  <?php echo $outra->cidade ;?> <?php echo '</td>' ?>
        
                     
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
             <div class="col-md-3 column">
        </div> 
           <div class="col-md-6 column">
          <h3>
            Testemunhas do processo
          </h3>
        </div>
         <div class="col-md-3 column">
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
                    <!-- <th class="header">Id processo</th> -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Nome</th>
                    <th class="green header">Telefone</th>
                    <th class="green header">Cidade</th>
                   
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_testemunhas as $testemunha) : ?> <!-- INFORMAÇÕES DAS TESTEMUNHAS -->
              <?php echo '<tr>' ?>
             <!--  <?php// echo '<td>' ?>  <?php// echo $testemunha->idProcesso ;?> <?php// echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $testemunha->idProcesso ;?>"><?php echo $testemunha->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_testemunhas/ver/" . $testemunha->idProcesso_testemunha ;?>"><?php echo $testemunha->nome_testemunha ;?></a> <?php echo '</td>' ?>
               <?php echo '<td>' ?>  <?php echo $testemunha->telefoneOne ;?> <?php echo '</td>' ?>
                <?php echo '<td>' ?>  <?php echo $testemunha->cidade ;?> <?php echo '</td>' ?>
        
                 
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
             <div class="col-md-3 column">
        </div> 
           <div class="col-md-6 column">
          <h3>
            Audiências do processo
          </h3>
        </div>
         <div class="col-md-3 column">
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
                    <!-- <th class="header">Id audiência</th> -->
                    <th class="header">Número do processo</th>
                    <th class="green header">Data da audiência</th>
                    <th class="green header">Horário</th>
                    <th class="green header">Cidade</th>
                    
                 </tr>
              </thead>  
              <tbody>
                <?php
                foreach($processos_audiencias as $audiencia) : ?> <!-- INFORMAÇÕES DAS AUDIENCIAS -->
              <?php echo '<tr>' ?>
             <!-- <?php// echo '<td>' ?>  <?php// echo $audiencia->idProcesso_Audiencia ;?> <?php// echo '</td>' ?> -->
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos/ver/" . $audiencia->idProcesso ;?>"><?php echo $audiencia->numero_processo ;?></a> <?php echo '</td>' ?>
              <?php echo '<td>' ?>  <a href="<?php echo base_url()."admin/processos_audiencias/ver/" . $audiencia->idProcesso_Audiencia ;?>"><?php echo date("d/m/Y", strtotime ($audiencia->data)) ;?></a> <?php echo '</td>' ?>
               <?php echo '<td>' ?>  <?php echo $audiencia->horario ;?> <?php echo '</td>' ?>
                <?php echo '<td>' ?>  <?php echo $audiencia->cidade  ;?> <?php echo '</td>' ?>
        
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

    <div class="panel panel-default">
                  <div class="panel-heading">Financeiro</div> <!-- INFORMAÇÕES DO FINANCEIRO -->
                  <div class="panel-body">
          <li class="list-group-item">Valor da causa: <?php echo "R$ " . number_format($processo->valor_causa,2,',','.'); ?></li>
          <li class="list-group-item">Custas: <?php echo "R$ " . number_format($processo->custas,2,',','.'); ?></li>
          <li class="list-group-item">Honorários: <?php echo "R$ " . number_format($processo->honorarios,2,',','.'); ?></li>
          <li class="list-group-item">Outras despesas: <?php echo "R$ " . number_format($processo->outras_despesas,2,',','.'); ?></li>
        </div>
      </div>
  </ul> 
    <div class="panel panel-default">
                  <div class="panel-heading">Outras informações</div> <!-- OUTRAS INFORMAÇÕES DO PROCESSO -->
                  <div class="panel-body">
          <li class="list-group-item">Qual a situação conjugal? <?php echo $processo->situacao_conjugal; ?></li>
          <li class="list-group-item">Se casado, qual regime? <?php echo $processo->casado_regime; ?></li>
          <li class="list-group-item">Possui filhos menores? <?php echo $processo->possui_filhos_menores; ?></li>
          <li class="list-group-item">Quantos púberes? <?php echo $processo->quantos_puberes; ?></li>
          <li class="list-group-item">Quantos impúberes? <?php echo $processo->quantos_impuberes; ?></li>
          <li class="list-group-item">Quantos maiores? <?php echo $processo->quantos_maiores; ?></li>
          <li class="list-group-item">Possui bens? <?php echo $processo->possui_bens; ?></li>
          <li class="list-group-item">Quais? <?php echo $processo->quais; ?></li>
          <li class="list-group-item">Pretende pensão alimenticia? <?php echo $processo->pretende_pensao_alimenticia; ?></li>
          <li class="list-group-item">Para si? <?php echo $processo->para_si; ?></li>
          <li class="list-group-item">Para os filhos? <?php echo $processo->para_os_filhos; ?></li>
          <li class="list-group-item">Renda alimentante: <?php echo "R$ " . number_format($processo->renda_alimentante,2,',','.');; ?></li>
        </div>
      </div>
  </ul> 

    <?php endforeach; ?>    
        <input type="button" value="Voltar" onClick="history.go(-1)">

  </div>
   <div class="col-md-3 column">
        </div> 

</div>
</body>
</html5>
