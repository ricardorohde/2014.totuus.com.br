<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Painel de Controle :: Totuus Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="css/fonts.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">        
    
    <link href="css/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="css/base-admin-3.css" rel="stylesheet">
    <link href="css/base-admin-3-responsive.css" rel="stylesheet">
    
    <link href="css/dashboard.css" rel="stylesheet">  

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>


    
<?php include("includes/topo.php") ?>

    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-6 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-star"></i>
					<h3>Meta mensal de fechamento de contratos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="stats">
						
						<div class="stat">
							<span class="stat-value">20</span>									
							Meta
						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value">16</span>									
							Concretizados
						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value">4</span>									
							Restante
						</div> <!-- /stat -->
						
					</div> <!-- /stats -->
					
					
					<div id="chart-stats" class="stats">
						
						<div class="stat stat-chart">							
							<div id="donut-chart" class="chart-holder"></div> <!-- #donut -->							
						</div> <!-- /substat -->
						
						<div class="stat stat-time">									
							<span class="stat-value">00:28:13</span>
							Tempo restante para fechamento da meta. =)
						</div> <!-- /substat -->
						
					</div> <!-- /substats -->
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->	
			
			
			<div class="widget widget-nopad stacked">
						
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Eventos recentes</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<ul class="news-items">
						<li>
							
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
								<p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">08</span>
								<span class="news-item-month">Mar</span>
							</div>
						</li>
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
								<p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">08</span>
								<span class="news-item-month">Mar</span>
							</div>
						</li>
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
								<p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">08</span>
								<span class="news-item-month">Mar</span>
							</div>
						</li>
					</ul>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->	
					
										
			
      		
	    </div> <!-- /span6 -->
      	
      	
      	<div class="col-md-6">	
      		
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-bookmark"></i>
					<h3>Atalhos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="shortcuts">
						
						<a href="usuarios.php" class="shortcut">
							<i class="shortcut-icon icon-user"></i>
							<span class="shortcut-label">Usu&aacute;rios</span>
						</a>
						
						<a href="contratos.php" class="shortcut">
							<i class="shortcut-icon icon-list-alt"></i>
							<span class="shortcut-label">Contratos</span>
						</a>
						
						<a href="pagamentos.php" class="shortcut">
							<i class="shortcut-icon icon-inbox"></i>
							<span class="shortcut-label">Pagamentos</span>								
						</a>
						
						<a href="#" id="btnNotificacoes" class="shortcut ui-popover" data-html="true" data-container="body" data-toggle="popover" data-trigger="click" data-placement="bottom" data-content="" >
							<div id="notificationContainer">
								<div id="notificationCount"></div>
								<i class="shortcut-icon icon-comment"></i>
								<span class="shortcut-label">Notifica&ccedil;&otilde;es</span>	
							</div>							
						</a>
					</div> <!-- /shortcuts -->	
				
				</div> <!-- /widget-content -->
				
			</div> <!-- /widget -->
					
					
			<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-signal"></i>
					<h3>Estat&iacute;stica de acesso ao sistema de rastreamento</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">					
					<div id="area-chart" class="chart-holder"></div>					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
					
								
	      </div> <!-- /span6 -->
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->
    


    
    
<?include ("includes/rodape.php");?>


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.resize.js"></script>

<script src="js/app.js"></script>

<script src="js/area.js"></script>
<script src="js/donut.js"></script>
<script src="js/painelControle.js"></script>
<script>
$(document).ready(function() {
	
	getQtdNotificacoesNaoLidas();
	getListaNotificacoes();
	
});
</script>
</body>
</html>
