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
              <a class="navbar-brand" href="#">AdCivil</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
               
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
                 <li class="active"><a href="#">Home</a></li>
               
            <!--    <li><a href="<?php //echo base_url()."contato"; ?>">Contato</a></li> -->
              <!--   <li><a href="#">Link</a></li> -->
            <!--     <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário: <?php //echo $username ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="home/logout">Sair</a></li>
                  </ul>
                </li> -->
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>
  </div>
  <div class="row clearfix">

<div class="container">
      <div class="row">
        <div class="col col-md-4">
          <div class="col col-md-6"></div>
        </div>
        <div class="col col-md-4">
         
          <form role="form" action="<?php echo base_url();?>usuarios/login_usuario" method="post" name="login">
             <?php echo validation_errors(); ?>
             <?php if($this->session->flashdata('login_error')){ ?>
             <?php echo  '<p class="bg-warning">' ."Algum dado está errado! tente novamente.".'</p>'; ?>
              
         <?php  } ?>
            <div class="form-group">
              <label for="username">Usuario</label>
              <input class="form-control" name="username" id="username" placeholder="Usuario" type="text">
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input class="form-control" name="password" id="password" placeholder="Senha" type="password">
            </div>
            <button type="submit" class="btn btn-default">Entrar</button>
          </form>
        </div>
        <div class="col col-md-4"></div>
      </div>
    </div>

    </div>
 

</body>
</html>



   <!--      
         <?php
              //$data = array('class'=>'formlogin','id'=>'formlogin');
            //echo form_open('usuarios/login_usuario',$data); ?>

            <?php //echo validation_errors(); ?>
           <?php //if($this->session->flashdata('login_error')){
              //echo 'Algum dado está errado! try again.';
          // } ?>
      <?php     //   echo form_fieldset("Login");
                //echo form_label('Username', 'username');
                //$data = array('name'=>'username','id'=>'username');
                //echo form_input($data);
                //echo form_label('Password', 'password');
                //$data = array('name'=>'password','id'=>'password');
                //echo form_password($data);
               // echo form_submit("btn_login", "Fazer login");
              //echo form_fieldset_close(); ?>
       <?php    // echo form_close();
           ?> -->