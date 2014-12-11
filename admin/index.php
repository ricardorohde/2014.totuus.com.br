<?php 
session_start();

if(!empty($_SESSION["idUsuarioAdmin"])){
	header("Location:painelControle.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login :: Totuus Admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="css/fonts.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
    <link href="css/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="css/base-admin-3.css" rel="stylesheet">
    <link href="css/base-admin-3-responsive.css" rel="stylesheet">
	
    <link href="css/signin.css" rel="stylesheet" type="text/css">


</head>

<body>
	
<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img src="../images/LogoTotuus.png" /></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>



<div class="account-container stacked">
	
	<div class="content clearfix">
		
		<form action="actions/loginAction.php?method=loginAdmin" method="post">
		
			<h1>Log In</h1>		
			
			<div class="login-fields">
				
				<p>Fa&ccedil;a o login informando os dados abaixo:</p>
				
				<div class="field">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" value="" placeholder="Seu email" class="form-control input-lg username-field" required/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="senha">Senha:</label>
					<input type="password" id="senha" name="senha" value="" placeholder="Sua senha" class="form-control input-lg password-field" required/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button class="login-action btn btn-primary">Sign In</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/app.js"></script>

<script src="js/signin.js"></script>

</body>
</html>
