<!DOCTYPE html>
<html class="visible-lg" lang="en">
  
  <head>
    <meta charset="utf-8">
    <title>AdCivil, seu escritório online.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
    rel="stylesheet">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
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
            <li><a href="<?php echo anchor(base_url('"admin/clientes"'))?>;">Contato</a>
            </li>
            <?php
            $links = array(
            anchor(base_url(),"Home"),
            anchor(base_url("admin/Advogados"),"Advogados"),
            anchor(base_url("admin/clientes"),"Clientes"),
            anchor(base_url("admin/processos"),"Processos"),
            anchor(base_url("admin/audiencias"),"Audiências"),
            anchor(base_url("admin/relatorios"),"Relatórios"),
            );  
              echo ul($links);
            ?>
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
          <form role="form">
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="E-mail"
              type="email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input class="form-control" id="exampleInputPassword1" placeholder="Senha"
              type="password">
            </div>
            <button type="submit" class="btn btn-default">Entrar</button>
          </form>
        </div>
        <div class="col col-md-4">
          <div class="col-lg-6">
  <table class="table table-bordered responsible-table ">
    <thead>
      <tr>  
      <th class="header">id</th>
      <th class="yellow header headerSortDown">Nome</th>  
      <th class="green header">Nº OAB</th>
      <th class="red header">Email</th>
      <th class="red header">Telefone</th>
    </tr>
    </thead>  
    <tbody>
      <?php
      foreach($advogados as $advogado) : ?>
    <?php echo '<tr>' ?>
    <?php echo '<td>' ?>  <a href="/"><?php echo $advogado->idAdvogado ;?></a> <?php echo '</td>' ?>
    <?php echo '<td>' ?>  <a href="/"><?php echo $advogado->nome_advogado ;?></a> <?php echo '</td>' ?>
    <?php echo '<td>' ?>  <a href="/"><?php echo $advogado->numero_oab ;?></a> <?php echo '</td>' ?>
    <?php echo '<td>' ?>  <a href="/"><?php echo $advogado->email ;?></a> <?php echo '</td>' ?>
    <?php echo '<td>' ?>  <a href="/"><?php echo $advogado->telefoneOne ;?></a> <?php echo '</td>' ?>
      <?php echo '</tr>'  ?>
      <?php endforeach; ?>
  </table>  
  </div>
        </div>
      </div>
    </div>
  </body>

</html>