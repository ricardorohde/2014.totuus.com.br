<?php
session_start();

require_once('classes/UsuarioManager.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contratos :: Totuus Admin</title>
    
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
						<span class="icon-list-alt"></span>
						<h3>Contratos</h3>
						<a class="btn btn-default glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal" style="margin-top: -36px; margin-right: 5px; float: right;" id="btnNovoContrato"></a>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th width="10%">N&uacute;mero</th>
								<th width="20%">Usu&aacute;rio respons&aacute;vel</th>
								<th width="10%">Data de in&iacute;cio</th>
								<th width="5%">Validade</th>
								<th width="5%">Pagamento</th>
								<th width="10%">Vencimento</th>
								<th width="5%">Valor(R$)</th>
								<th width="5%">A&ccedil;&otilde;es</th>								
							</tr></thead>
					
							<tbody id="contratos">
						
								<tr align="center" id="loadingContratos"><td colspan="8" ><img src="images/loading.gif" class="loadingSmall"/></td> </tr>
						
							</tbody>
						</table>
						
					</div> <!-- .widget-content -->
					
				</div> <!-- /widget -->	
      			
  			</div> <!-- /span4 -->
      	
		</div> <!-- /row -->
      
      	<div class="row">
      
      	<div class="col-md-12">

      		<div class="widget big-stats-container stacked">
      			
      			<div class="widget-content">
      				
		      		<div id="big_stats" class="cf">
						<div class='stat'>								
							<h4>Localiza&ccedil;&atilde;o</h4>
							<span class='value'><img src='images/loading.gif' class='loadingBig'/></span>								
						</div>
						
						<div class='stat'>								
							<h4>Monitoramento</h4>
							<span class='value'><img src='images/loading.gif' class='loadingBig'/></span>								
						</div>
						
						<div class='stat'>								
							<h4>Dyn DNS</h4>
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
		<form action="" id="contratoForm" method="post" onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Dados do contrato</h4>
	      </div>
	      <div class="modal-body">
	      
	      	<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_nome">N&uacute;mero</label>                
				<div class="">                                        
					<input type="text" class="form-control" id="numContrato" name="numContrato" disabled="disabled">
				</div>                
			</div>
			
	        <div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_email">Data de in&iacute;cio:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Data de in&iacute;cio" id="datInicio" name="datInicio" disabled="disabled">
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="validateSelect">Validade:</label>
				<div class="">
	              <select id="numMesesValidade" name="numMesesValidade" class="form-control">
	                <option value="12">12</option>
					<option value="24">24</option>
					<option value="36">36</option>
					<option value="48">48</option>
	              </select>
	            </div>               
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left;">                
				<label for="validateSelect">Forma de pagamento:</label>
				<div class="">
	              <select id="numFormaPagamento" name="numFormaPagamento" class="form-control">
	                <option value="1">Boleto</option>
					<option value="2">Carn&ecirc;</option>
					<option value="3">Cart&atilde;o</option>
	              </select>
	            </div>               
			</div>
			
			<div class="control-group form-group" style="width: 173px;float: left; margin-right: 8px;">                
				<label for="validateSelect">Vencimento:</label>
				<div class="">
	              <select id="numDiaVencimento" name="numDiaVencimento" class="form-control">
	                <option value="05">05</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
	              </select>
	            </div>               
			</div>
			
			<div class="control-group form-group" style="width: 171px;float: left;  margin-right: 8px;">                
				<label for="validateSelect">Servi&ccedil;o:</label>
				<div class="">
	              <select id="seqServico" name="seqServico" class="form-control">
	                <option value="1">Localiza&ccedil&atilde;o</option>
					<option value="2">Monitoramento</option>
					<option value="3">Dyn DNS</option>
	              </select>
	            </div>               
			</div>
			
			<div class="control-group form-group" style="width: 170px;float: left; margin-right: 8px;">                
				<label for="cscf_nome">Valor</label>                
				<div class="">                                        
					<input type="text" class="form-control" id="vlrContrato" name="vlrContrato" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 540px;float: left;">                
				<label for="validateSelect">Usu&aacute;rio respons&aacute;vel:</label>
				<div class="">
	              <select id="seqUsuario" name="seqUsuario" class="form-control">
	                <?
	                
	                	$usuarioManager = new UsuarioManager();
	                	$usuarios = $usuarioManager->findAll();
	                	
	                	while($ususario = mysql_fetch_array($usuarios))
						{
							echo "<option value='".$ususario['seq_usuario']."'>".$ususario['dsc_nom_usuario']."</option>";
						}
	                
	                ?>
	              </select>
	            </div>               
			</div>
			
			<div class="control-group form-group" style="width: 540px;float: left;">  
				<label for="validateSelect">Observa&ccedil;&otilde;es:</label>
				<div class="">
	              <textarea class="form-control" rows="4" name="dscObservacao" id="dscObservacao"></textarea>
	            </div>   
			</div>
			
			<input type="hidden" name="seqContrato" id="seqContrato" value="value" />
	      </div>
	      <div class="modal-footer" style="margin-top: 500px;">
	        <button type="button" class="btn btn-primary" onclick="inserirContrato();" id="btnSalvar">Salvar</button>
	        <button type="button" class="btn btn-primary" onclick="alterarContrato();" id="btnAlterar" style="display:none;">Alterar</button>
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
	
	<script src="js/contratos.js"></script>
	<script src="js/notifications.js"></script>
	
	<script>
	$(document).ready(function() {
		$('#datInicio').mask('00/00/0000');
		getListaContratos();
		getQtdContratos();
		
	});
	</script>
  </body>
</html>
