<?php 
session_start();

require_once("../classes/br.com.totuus/UsuarioManager.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="br" lang="br" xmlns="http://www.w3.org/1999/xhtml">
<head>
	
	<title>Totuus - Localização e Monitoramento</title>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta http-equiv="Content-Style-Type" content="text/css" />

	<link rel="shortcut icon" href="../../favicon.ico" />
	<link href="../../css/styles.css" type="text/css" rel="stylesheet" />

</head>
<script type="text/javascript" src="../../js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="../../js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="../../js/totuus.js"></script>
<!-- Google Analytics -->
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30032054-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>

<body>

	<div id="Container">
	
		<!-- LOGO -->
		<div id="Outer">
			<div id="Header">
				<div id="Logo">
					<a href="index.php"><img src="../../images/LogoTotuus.png" border="0" id="LogoImage" alt="Totuus - Localização e Monitoramento" /></a>
				</div>
				<br class="Clear" />
			</div>		
		</div>
		
		<div id="TopMenu">
			<ul>
				<?php if(!empty($_SESSION["idUsuarioAdmin"])) { ?>
      <li><a href="usuario.php">Controle de Usuários</a></li>
      <li><a href="contrato.php">Controle de Contratos</a></li>
      <li><a href="servico.php">Controle de Serviços</a></li>
      <li><a href="monitor.php">Monitor de Câmeras</a></li>
	  <li><a href="tabelaPrecos.php">Tabela de Preços</a></li>
      <?php }?>
			</ul>
			<br class="Clear" />
		</div>
		
		<div id="msgContainer" style="display:none;">
			<div id="msgImage"><img src="images/success-icon.png" width="30" height="30" id="iconMsg" /></div>
			<div id="msgRetorno">Mensagem enviada com sucesso.</div>
		</div>
		
		<!-- CORPO -->
		<div class="Content" style="margin-left: 5px;">
		   
			<div id="bodyContainer">
				
				<h2>Controle de Usuários</h2>
				
				<form action="../../aplicacao/actions/usuarioAction.php?method=inserirUsuario" method="post" class="wpcf7-form">

				<p class="name">Nome<br />
					<input type="text" class="inputFormContato" value="" size="40" id="nome" name="nome"/>
				</p>
				<p class="email">E-mail<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="email" name="email"/>
				</p>
				<p class="telefone">DDD/Telefone<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="fone" name="fone"/>
				</p>
				<p class="telefone">DDD/Celular<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="celular" name="celular"/>
				</p>
				
				<p class="name">Data Nascimento<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="dataNascimento" name="dataNascimento"/>
				</p>
				
				<p class="name">CPF/CNPJ<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="cpfCnpj" name="cpfCnpj"/>
				</p>
				
				<p class="cidade">Endereço<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="endereco" name="endereco"/>
				</p>
				
				<p class="cidade">Complemento<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="complemento" name="complemento"/>
				</p>
				
				<p class="cidade">CEP<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="cep" name="cep"/>
				</p>
				
				<p class="name">Usuário GPS Gate<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="usuarioGPSGate" name="usuarioGPSGate"/>
				</p>
				
				<p class="name">Senha<br />
					<input type="password" class="inputFormContato" value="" size="40" id="senha" name="senha"/>
				</p>
				
				<p class="name">Confirma Senha<br />
					<input type="password" class="inputFormContato" value="" size="40" id="confirmaSenha" name="confirmaSenha"/>
				</p>
				
				<p class="cidade">Cidade<br />
					<input type="text" class="inputFormContato" value="" size="40"  id="cidade" name="cidade"/>
				</p>
				
				<p class="estado">Estado<br />
					<select id="estado" name="estado">
						<option value="AC">AC</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AM">AM</option>
						<option value="BA">BA</option>
						<option value="CE" selected="selected">CE</option>
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
				</p>
				<p class="estado">Administrador?<br />
					<select id="admin" name="admin">
						<option value="1">Sim</option>
						<option value="0">Não</option>
					</select>
					
				</p>
				
				<p>
				
					<input type="button" value="Voltar" onclick="javascript:window.location='usuario.php';" />
				</p>
				
				<p>
					<input type="submit" value="Cadastrar" />
				</p>
				
			</form>
			</div>
			
		</div>
		
		<br class="Clear" />
        
		<!-- FOOTER -->
		<div id="Footer">
			<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.totuus.com.br&amp;send=false&amp;layout=button_count&amp;width=135&amp;show_faces=true&amp;action=recommend&amp;colorscheme=light&amp;font=verdana&amp;height=21&locale=pt_BR" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:21px;" allowTransparency="true"></iframe>
		
			<div style="padding-left: 470px; float: right;">Copyright &copy; 2012 Totuus. Todos os Direitos Reservados.</div>
			
		</div>

	
	</div>
</body>   
</html>
		
	