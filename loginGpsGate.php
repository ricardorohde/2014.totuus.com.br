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

    </head>
    
    <body style="background-color: #EDEDED">
        
		<div class="navbar-wrapper">
  			<div class="container">
				<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      				<div class="container">
        				<div class="navbar-header">
            				<a class="navbar-brand" href="#"><img src="images/LogoTotuus.png" /></a>
          				</div>
      				</div>
    			</div>
  			</div>
		</div>

		<div class="container marketing" >
			
			<div class="row" style="margin: 10px; margin-top: 80px; background-color: #FFFFFF; border-radius: 6px; border:1px solid #E5E5E5;">
				<form action="aplicacao/actions/loginAction.php?method=loginGpsGate" id="login-form" method="post">
			      <div class="modal-header">
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
			      <div class="modal-footer" style="height: 45px;">
			        <button type="sumit" class="btn btn-primary">Entrar</button>
			      </div>
				</form>				
			</div>
			
			
		</div>

		
		
        <script type='text/javascript' src="js/jquery.min.js"></script>
        <script type='text/javascript' src="js/bootstrap.min.js"></script>
	    <script src="js/totuus.js" type="text/javascript"></script> 

    </body>
    
</html>