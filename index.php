<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="generator" content="Bootply" />
		<title>Totuus - Localiza&ccedil;&atilde;o e Monitoramento</title>
		
		
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/home.css" rel="stylesheet">
       
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        
        <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
    
    <body  >
        
		<div class="navbar-wrapper">
  			<div class="container">
				<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      				<div class="container">
        				<div class="navbar-header">
            				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	              				<span class="sr-only">Toggle navigation</span>
	              				<span class="icon-bar"></span>
	              				<span class="icon-bar"></span>
	              				<span class="icon-bar"></span>
            				</button>
            				<a class="navbar-brand" href="#home"><img src="images/LogoTotuus.png" /></a>
          				</div>
        
				        <div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#home">In&iacute;cio</a></li>
								<li><a href="#localizacao">Localiza&ccedil;&atilde;o</a></li>
								<li><a href="#monitoramento">Monitoramento</a></li>
								<li><a href="#produtos">Produtos</a></li>
								<li><a href="#quemSomos">Quem somos</a></li>
								<li><a href="#faleConosco">Fale conosco</a></li>
								<li>
									<a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
										<?php if(empty($_SESSION["idUsuario"])) { ?>
											Login
										<?php } else { ?>
											<b><?=$_SESSION["nomeUsuario"]?></b>
										<?php } ?>
									</a>
								</li>
				            </ul>
				            
						</div>
      				</div>
    			</div>
  			</div>
		</div>

		<section id="home">
			
			

			<div class="container marketing" >
 
 				<div class="jumbotron" style="margin-top: 80px">
					<h1>Navbar example</h1>
					<p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
					<p>To see the difference between static and fixed top navbars, just scroll.</p>
					<p>
					<a class="btn btn-lg btn-primary" role="button" href="../../components/#navbar">View navbar docs »</a>
					</p>
				</div>
 
 
				<div class="row">
					
					<div class="col-md-4 text-center">
						<img src="images/Icone_Localizacao.png">
						<h3>Localiza&ccedil;&atilde;o</h3>
						<p>A Totuus disp&otilde;e da mais alta tecologia em termo de localiza&ccedil;&atilde;o veicular e pessoal. Nossos servidores trabalham em um ambiente de alta disponibilidade, o que significa que est&atilde;o dispon&iacute;veis em tempo integral 24 horas por dia, 7 dias por semana, com uma infraestrutura dedicada, executa backups di&aacute;rios e possue servidores extras em caso de falha do principal.</p>
						<p><a class="btn btn-default" href="#localizacao">Veja mais</a></p>
					</div>
					
					<div class="col-md-4 text-center">
      					<img src="images/Icone_Camera.png">
      					<h3>Monitoramento</h3>
      					<p>Conhecendo a rotina atual em que vivemos, a Totuus oferece aos seus clientes a comodidade de observar a partir de um computador, tablet ou smartphone conectado a internet, os ambientes que mais lhes s&atilde;o importantes, seja sua casa, escrit&oacute;rio em empresa, observando o comportamentos de seus familiares e empregados.</p>
      					<p><a class="btn btn-default" href="#monitoramento">Veja mais</a></p>
    				</div>
    				
    				<div class="col-md-4 text-center">
      					<img src="images/Icone_Produtos.png">
      					<h3>Nossos produtos</h3>
      					<p>A Totuus, est&aacute; sempre em busca do que existe de mais atual no mercado nacional e mundial em termos de equipamentos e sistemas, dessa forma, dispomos de diferentes tipos de rastreadores GPS e c&acirc;meras de monitoramento, que ir&atilde;o se adequar as necessidades de cada usu&aacute;rio atendendo da melhor forma poss&iacute;vel as necessidades espec&iacute;ficas de cada cliente.</p>
      					<p><a class="btn btn-default" href="#produtos">Veja mais</a></p>
    				</div>
    				
  				</div>
			</div>
			
		</section>
		
		<?php include("localizacao.php") ?>

		<?php include("monitoramento.php") ?>
		
		<?php include("produtos.php") ?>
		
		<?php include("quemSomos.php") ?>
		
		<?php include("faleConosco.php") ?>
		
		<?php include("login.php") ?>
		
		<footer>
			<div class="container">
		    	<p>Copyright &copy; 2012 Totuus. Todos os Direitos Reservados.</p>
		    </div>
		</footer>

        <script type='text/javascript' src="js/jquery.min.js"></script>
        <script type='text/javascript' src="js/bootstrap.min.js"></script>
	    <script src="js/totuus.js" type="text/javascript"></script> 

		

    </body>
    
</html>