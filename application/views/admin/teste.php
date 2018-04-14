<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bootstrap, from Twitter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>

<body class="">
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
          <li><a href="#">Contacts</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
            <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="col-lg-6">
  <table class="table table-bordered responsible-table ">
  <thead>
    <tr>  
      <th class="header">Excluir</th>
       <th class="header">Editar</th>
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
<?php /*echo '<td>' ?> 
        <?php 'base_url("admin/advogados/excluir/"' . $advogado->idAdvogado
          img('assets/imgs/xis.gif'),
          array('onclick'=>"return confirm('Confirma a exclusão deste advogado?');")
        )?> <?php echo '</td>' */?>
   <?php echo '<td>'?><a href="<?php echo base_url()."admin/advogados/excluir/".$advogado->idAdvogado; ?>"><img src='../assets/imgs/xis.gif'/></a> <?php echo '</td>' ?>  
   <?php echo '<td>'?><a href="<?php echo base_url()."admin/advogados/editar/".$advogado->idAdvogado; ?>"><img src="../assets/imgs/gear.gif"/></a>  <?php echo '</td>' ?>   
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

      <div class="col-md-4"></div>
    </div>
  </div>
</body>

</html>