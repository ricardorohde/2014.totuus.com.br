<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Usu&aacute;rios :: Totuus Admin</title>
    
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
						<span class="icon-user"></span>
						<h3>Usu&aacute;rios</h3>
						<a class="btn btn-default glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal" style="margin-top: 4px; margin-right: 5px; float: right;"></a>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th width="30%">Nome</th>
								<th width="30%">Email</th>
								<th width="20%">A&ccedil;&otilde;es</th>								
							</tr></thead>
					
							<tbody id="usuarios">
						
								<tr align="center" id="loadingUsuarios"><td colspan="3" ><img src="images/loading.gif" class="loadingSmall"/></td></tr>
						
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
							<h4>Usu&aacute;rios administradores</h4>
							<span class='value'><img src='images/loading.gif' class='loadingBig'/></span>								
						</div>
						
						<div class='stat'>								
							<h4>Usu&aacute;rios de aplica&ccedil;&atilde;o</h4>
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
		<form action="aplicacao/actions/loginAction.php?method=login" id="usuarioForm" method="post" onsubmit="return false;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Dados do usu&aacute;rio</h4>
	      </div>
	      <div class="modal-body">
	      
	      	<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_nome">Nome:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Nome" id="dscNomUsuario" name="dscNomUsuario" title="teste" required >
				</div>                
			</div>
			
	        <div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_email">E-mail:</label>                
				<div class="">                                        
					<input type="email" class="form-control" placeholder="Informe seu email" id="dscEmailUsuario" name="dscEmailUsuario" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_telefone">Telefone:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Telefone" id="numTelefone" name="numTelefone" pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4}" title="(88)9999-3333" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_celular">Celular:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Celular" id="numFoneCelular" name="numFoneCelular" pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4}" title="(88)9999-3333" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_dataNascimento">Data de nascimento:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Data de nascimento" id="datNascimento" name="datNascimento" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" title="DD/MM/AAAA" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_cpfCnpj">CPF/CNPJ:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="CPF/CNPJ" id="codCpfCnpj" name="codCpfCnpj" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}) | [0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}" title="111.222.333-44 ou 11.222.333/4444-55" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_endereco">Endere&ccedil;o:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Endere&ccedil;o" id="dscEndereco" name="dscEndereco" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_complemento">Complemento:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Complemento" id="dscComplemento" name="dscComplemento">
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_cep">CEP</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="CEP" id="dscCep" name="dscCep" pattern="[0-9]{5}-[0-9]{3}" title="66666-555"required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_usuarioGPSGate">Usu&aacute;rio GPS Gate:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Usu&aacute;rio GPS Gate" id="nomUsuarioGpsgate" name="nomUsuarioGpsgate">
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="cscf_senha">Senha:</label>                
				<div class="">                                        
					<input type="password" class="form-control" placeholder="Senha" id="dscSenhaUsuario" name="dscSenhaUsuario">
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_confirmaSenha">Confirma senha:</label>                
				<div class="">                                        
					<input type="password" class="form-control" placeholder="Confirma senha" id="confirmaSenha" name="confirmaSenha" pattern="" title="Senha n&atilde;o confere.">
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px;float: left; margin-right: 8px;">                
				<label for="validateSelect">Estado:</label>
				<div class="">
	              <select id="dscUf" name="dscUf" class="form-control">
	                <option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					<option value="BA">BA</option>
					<option selected="selected" value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PR">PR</option>
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="RR">RR</option>
					<option value="RO">RO</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					<option value="RS">RS</option>
					<option value="SC">SC</option>
					<option value="SP">SP</option>
					<option value="SE">SE</option>
					<option value="TO">TO</option>
	              </select>
	            </div>               
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left;">                
				<label for="cscf_cidade">Cidade:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="Cidade" id="dscCidade" name="dscCidade" required>
				</div>                
			</div>
			
			<div class="control-group form-group" style="width: 265px; float: left; margin-right: 8px;">                
				<label for="cscf_cidade">Aplica&ccedil;&atilde;o GPS Gate:</label>                
				<div class="">                                        
					<input type="text" class="form-control" placeholder="No. aplica&ccedil;&atilde;o GPS Gate" id="numAppGpsgate" name="numAppGpsgate">
				</div>                
			</div>
			
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
	
	<script src="js/usuarios.js"></script>
	<script src="js/notifications.js"></script>
	
	<script>
	$(document).ready(function() {
		$('#numTelefone').mask('(00)0000-0000');
		$('#numFoneCelular').mask('(00)0000-0000');
		$('#datNascimento').mask('00/00/0000');
		$('#dscCep').mask('00000-000');
		
		getListaUsuarios();
		getQtdUsuarios();
		
	});
	</script>
  </body>
</html>
