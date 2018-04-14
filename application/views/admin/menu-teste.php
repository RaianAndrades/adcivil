<!DOCTYPE html>
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
	
	<link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../Assets/css/style.css" rel="stylesheet">

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
				        <li class="active"><a href="#">Home</a></li>
				        <li><a href="<?php echo base_url()."admin/advogados/"; ?>">Advogados</a></li>
				        <li><a href="<?php echo base_url()."admin/clientes/"; ?>">Clientes</a></li>
				        <li><a href="<?php echo base_url()."admin/processos/"; ?>">Processos</a></li>
				        <li><a href="<?php echo base_url()."admin/audiencias/"; ?>">Audiências</a></li>
				        <li><a href="<?php echo base_url()."admin/relatorios/"; ?>">Relatórios</a></li>
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
				      <!--   <li><a href="#">Link</a></li> -->
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário: <b class="caret"></b></a>
				          <ul class="dropdown-menu">
				            <li><a href="#">Sair do sistema</a></li>
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
						Lista de advogados cadastrados
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
				  </tbody>
  				</table>  
  			</div>
  			<div class="col-md-2 column">
				</div>
  			</div>
	</div>	
	<div class="row clearfix">
		<div class="col-md-4 column">
			<h2>
				Heading
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4 column">
			<h2>
				Heading
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4 column">
			<h2>
				Heading
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
	</div>
</div>
</body>
</html>
