<!DOCTYPE html>
<html class="visible-lg" lang="en">
  
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

     <link href="<?php echo base_url();?>Assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>Assets/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo base_url();?>Assets/css/style.css" rel="stylesheet"> 
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>Assets/js/bootstrap.js"></script>

  </head>
  
  <body>
    <div class="navbar navbar-default navbar-static-top navbar-inverse">
      <style>
        .body{padding-top:70px}
      </style>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" href="#">AdCivil</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a>
            </li>
            <li><a href="#">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col col-md-4">
          <div class="col col-md-6"></div>
        </div>
        <div class="col col-md-4">
          <?php echo validation_errors(); ?>
          <form role="form" action="<?php echo base_url();?>verificalogin/" method="post" name="login">
            <div class="form-group">
              <label for="username">Usuario</label>
              <input class="form-control" id="username" placeholder="Usuario"
              type="text">
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input class="form-control" id="password" placeholder="Senha"
              type="password">
            </div>
            <button type="submit" class="btn btn-default">Entrar</button>
          </form>
        </div>
        <div class="col col-md-4"></div>
      </div>
    </div>
  </body>

</html>