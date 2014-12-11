<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<?php if(empty($_SESSION["idUsuario"])) { ?>      
		<form action="aplicacao/actions/loginAction.php?method=login" id="login-form" method="post">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Informe os dados para Login</h4>
	      </div>
	      <div class="modal-body">
	        <div class="control-group form-group">                
				<label for="cscf_email">E-mail:</label>                
				<div class="">                                        
					<input type="email" class="form-control" placeholder="Informe seu email" id="email" name="email" required>
				</div>                
			</div>
			
			<div class="control-group form-group">                
				<label for="cscf_senha">Senha:</label>                
				<div class="">                                        
					<input type="password" class="form-control" placeholder="Informe sua senha" id="senha" name="senha" required>
				</div>                
			</div>
			
	      </div>
	      <div class="modal-footer">
	        <button type="sumit" class="btn btn-primary">Entrar</button>
	      </div>
		</form>
		<?php } else { ?>

		<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Dados do Usu&aacute;rio </h4>
	    </div>
	    
	    <div class="modal-body">
	       	
	       	<h3 style="color: #555555;">Seja bem-vindo Sr(a). <b><?php echo $_SESSION["nomeUsuario"] ?></b>.</h3> 
			<p>&Uacute;ltimo login em <?=$_SESSION["dataUltimoLoginUsuario"]?></p>
	    </div>
	      
	      <div class="modal-footer">
	      	<a href="aplicacao/server93.php" class="btn btn-primary">Ir para sistema</a>
	        <a href="aplicacao/actions/loginAction.php?method=logout" class="btn btn-danger">Sair</a>
	      </div>

		<?php } ?>
    </div>
  </div>
</div>