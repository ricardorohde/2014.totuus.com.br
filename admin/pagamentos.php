<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pagamentos m&ecirc;s corrente:: Totuus Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    <link href="css/msgGrowl.css" rel="stylesheet">
	<link href="css/jquery.lightbox.css" rel="stylesheet">	
	<link href="css/jquery.msgbox.css" rel="stylesheet">
    <link href="css/base-admin-3.css" rel="stylesheet">
    <link href="css/base-admin-3-responsive.css" rel="stylesheet">
    <link href="css/reports.css" rel="stylesheet">
 	<link href="css/admin.css" rel="stylesheet">
 	
  </head>

<body>

<?php include("includes/topo.php") ?>
    
<div class="main">

    <div class="container">

		<div class="row">
      	
      		<div class="col-md-12">
      		
      			<div class="widget stacked widget-table">
					
					<div class="widget-header">
						<span class="icon-inbox"></span>
						<h3>Pagamentos m&ecirc;s corrente - Contratos</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th width="30%">Nome usu&aacute;rio respons&aacute;vel</th>
								<th width="20%">N&uacute;mero do contrato</th>
								<th width="20%">Data pagamento</th>
								<th width="20%">Status</th>
								<th width="20%">Valor(R$)</th>
								<th width="10%">A&ccedil;&otilde;es</th>								
							</tr></thead>
					
							<tbody id="pagamentos">
						
								<tr align="center" id="loadingUsuarios"><td colspan="6" ><img src="images/loading.gif" class="loadingSmall"/></td> </tr>
						
							</tbody>
						</table>
						
					</div> <!-- .widget-content -->
					
				</div> <!-- /widget -->	
      			
      			<div class="widget stacked widget-table">
					
					<div class="widget-header">
						<span class="icon-inbox"></span>
						<h3>Pagamentos m&ecirc;s corrente - Avulsos</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th width="30%">Nome cliente</th>
								<th width="30%">Data pagamento</th>
								<th width="30%">Status</th>
								<th width="30%">Valor(R$)</th>
								<th width="10%">A&ccedil;&otilde;es</th>								
							</tr></thead>
					
							<tbody id="pagamentosAvulsos">
						
								<tr align="center" id="loadingPagamentosAvulsos"><td colspan="4" ><img src="images/loading.gif" class="loadingSmall"/></td> </tr>
						
							</tbody>
							
						</table>
						
					</div> <!-- .widget-content -->
					
				</div> 
      			
  			</div> <!-- /span4 -->
      	
		</div> <!-- /row -->
      
      	<div class="row">
      
      	<div class="col-md-12">

      		<div class="widget big-stats-container stacked">
      			
      			<div class="widget-content">
      				
		      		<div id="big_stats" class="cf">
						<div class='stat'>								
							<h4>Pagamentos realizados</h4>
							<span class='value'><img src='images/loading.gif' class='loadingBig'/></span>								
						</div>
						
						<div class='stat'>								
							<h4>Pagamentos em aberto</h4>
							<span class='value'><img src='images/loading.gif' class='loadingBig'/></span>								
						</div>
						
					</div>
				</div> <!-- /widget-content -->
				
			</div> <!-- /widget -->
      		
      	</div> <!-- /span12 -->	
      	
  	  </div> <!-- /row -->
      	
    </div> <!-- /container -->
    
</div> <!-- /main -->
    

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form action="#" id="pagamentoForm" method="post" onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Dados do pagamento</h4>
	      </div>
	      <div class="modal-body">
	      
			<div class="control-group form-group" style="width: 265px;float: left; ">                
				<label for="validateSelect">Administrador?</label>
				<div class="">
	              <select id="staAdmin" name="staAdmin" class="form-control">
	                <option value="1">Sim</option>
					<option value="2" selected="selected">N&atilde;o</option>
	              </select>
	            </div>               
			</div>
			
			<input type="hidden" name="seqUsuario" id="seqUsuario" value="value" />
	      </div>
	      <div class="modal-footer" style="margin-top: 700px;">
	        <button type="button" class="btn btn-primary" onclick="inserirUsuario();" id="btnSalvar">Salvar</button>
	        <button type="button" class="btn btn-primary" onclick="alterarUsuario();" id="btnAlterar" style="display:none;">Alterar</button>
	        <button type="submit" class="btn btn-primary" id="btnSubmit" style='display: none;'>Hiden</button>
	      </div>
		</form>
    </div>
  </div>
</div>


	<?include ("includes/rodape.php");?>
 
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/msgGrowl.js"></script>
	<script src="js/jquery.lightbox.min.js"></script>
	<script src="js/jquery.msgbox.min.js"></script>
	
	<script src="js/pagamentos.js"></script>
	<script src="js/notifications.js"></script>
	
	<script>
	$(document).ready(function() {
	
		getListaPagamentosMesCorrente();
		getListaPagamentosAvulsosMesCorrente();
		getQtdPagamentos();
		
	});
	</script>
  </body>
</html>
