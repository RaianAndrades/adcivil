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
                <li><a href="<?php echo base_url()."admin/processos"; ?>">Processos</a></li>
                <li><a href="<?php echo base_url()."admin/processos_audiencias"; ?>">Audiências</a></li>
                <li><a href="<?php echo base_url()."admin/relatorios"; ?>">Relatórios</a></li>
                <li class="active"><a href="<?php echo base_url()."admin/usuarios"; ?>">Usuarios</a></li>
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
        <div class="col-md-12 column">
        
               
        </div>
        
    </div>
</div> 
<!-- ALTERAR USUARIO  -->
     <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
          <h3>
            Alteração de usuário
          </h3>
        </div>
        <div class="col-md-4 column">
        </div>
    </div>

  <div class="row clearfix">
         <div class="col-md-3 column">
        </div> 
        <div class="col-md-6 column">

          <?php 
            foreach ($usuarios as $usuario) : ?>

            <?php endforeach;
          ?>

          <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/usuarios/gravar_alteracao" method="post">

            <div class="form-group">
                <input class="form-control" type="hidden" name="id" value="<?php echo $usuario->id; ?>" />
             </div>  
             <div class="form-group">
                <label class="control-label" for="nome">Nome:</label>
                <input class="form-control" type="text" placeholder="Nome" name="nome" required  value="<?php echo $usuario->nome; ?>" />
             </div>  

              <div class="form-group">
                <label class="control-label" for="email">Email:</label>
                <input class="form-control" type="text" placeholder="Email" name="email"  value="<?php echo $usuario->email; ?>" />
             </div>  

             <div class="form-group">
                <label class="control-label" for="username">Usuário:</label>
                <input class="form-control" type="text" placeholder="Usuário" name="username"  value="<?php echo $usuario->username; ?>" />
             </div>  

             <div class="form-group">
                <label class="control-label" for="password">Senha:</label>
                <input class="form-control" type="text" placeholder="Senha" name="password"  value="<?php echo $usuario->password; ?>" />
             </div>  
                  <?php $result = $this->usuarios->getAccess($usuario->access);?>
               <div class="form-group">
                <label class="control-label" for="access">Tipo de acesso:</label>
                  <select class="form-control" name="access" class="btn-slide" value="<?php echo set_value('access');?> " >
                    <?php foreach($result as $r) { ?>
                     <option value="<?php echo $usuario->access; ?>"> <?php echo $r->nome; ?></option> 
                     <?php } ?>
                   
                        <?php $this->usuarios->showAcessoUsuarios(); ?>
                  </select>  
              </div> 
             

              <button type="submit" class="btn btn-default">Alterar</button>
            </form>
          </div>  
            <div class="col-md-3 column">
        </div> 
      </div>

        
</body>
</html>     