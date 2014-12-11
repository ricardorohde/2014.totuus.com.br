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
<script language="javascript">
function showMensagem() {
	
	var sta = getParameterByName('sta');

	if(sta == 'success') {
		$("#msgContainer").css('border-color', '#009900');
		$("#msgContainer").css('color', '#009900');
		$("#msgContainer").fadeIn('slow');
		setTimeout("$('#msgContainer').fadeOut(2000);", 5000);
	} else if (sta == 'error') {
		$("#msgRetorno").html('Ocorreu algum erro durante a operação. Favor entrar em contato com o responsável.');
		$("#msgContainer").css('border-color', '#CC0000');
		$("#msgContainer").css('color', '#CC0000');
		$("#iconMsg").attr('src', '../../images/error-icon.png');
		$("#msgContainer").fadeIn('slow');
		setTimeout("$('#msgContainer').fadeOut(2000);", 5000);
	}

}
</script>
<body onload="showMensagem();">

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
			<div id="msgImage"><img src="../../images/success-icon.png" width="30" height="30" id="iconMsg" /></div>
			<div id="msgRetorno">Dados do usuário alterados com sucesso!</div>
		</div>
		
		<!-- CORPO -->
		<div class="Content" style="margin-left: 5px;">
		   
			<div id="bodyContainer">
				
				<h2>Controle de Usuários</h2>
				
				
				<?php 
				
					$usuarioManager = new UsuarioManager();
					$usuario = $usuarioManager->findById($_REQUEST['seqUsuario']);
					
					
				?>
				
				
				<form action="../../aplicacao/actions/usuarioAction.php?method=alterarUsuario" method="post">

				<p class="name">Nome<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->dscNomUsuario ?>" size="40" id="nome" name="nome"/>
				</p>
				<p class="email">E-mail<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->dscEmailUsuario ?>" size="40"  id="email" name="email"/>
				</p>
				<p class="telefone">DDD/Telefone<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->numTelefone ?>" size="40"  id="fone" name="fone"/>
				</p>
				<p class="telefone">DDD/Celular<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->numFoneCelular ?>" size="40"  id="celular" name="celular"/>
				</p>
				
				<p class="name">Data Nascimento<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->datNascimento ?>" size="40"  id="dataNascimento" name="dataNascimento"/>
				</p>
				
				<p class="name">CPF/CNPJ<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->codCpfCnpj ?>" size="40"  id="cpfCnpj" name="cpfCnpj"/>
				</p>
				
				<p class="cidade">Endereço<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->dscEndereco ?>" size="40"  id="endereco" name="endereco"/>
				</p>
				
				<p class="cidade">Complemento<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->dscComplemento ?>" size="40"  id="complemento" name="complemento"/>
				</p>
				
				<p class="cidade">CEP<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->dscCep ?>" size="40"  id="cep" name="cep"/>
				</p>
				
				<p class="name">Usuário GPS Gate<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->nomUsuarioGpsgate ?>" size="40"  id="usuarioGPSGate" name="usuarioGPSGate"/>
				</p>
				
				<p class="cidade">Cidade<br />
					<input type="text" class="inputFormContato" value="<?=$usuario->dscCidade ?>" size="40"  id="cidade" name="cidade"/>
				</p>
				
				<p class="estado">Estado<br />
				
					<select id="estado" name="estado">
						<option value="AC" <?= $usuario->dscUf == 'AC' ? 'selected=\'selected\'':'' ?>>AC</option>
						<option value="AL" <?= $usuario->dscUf == 'AL' ? 'selected=\'selected\'':'' ?>>AL</option>
						<option value="AP" <?= $usuario->dscUf == 'AP' ? 'selected=\'selected\'':'' ?>>AP</option>
						<option value="AM" <?= $usuario->dscUf == 'AM' ? 'selected=\'selected\'':'' ?>>AM</option>
						<option value="BA" <?= $usuario->dscUf == 'BA' ? 'selected=\'selected\'':'' ?>>BA</option>
						<option value="CE" <?= $usuario->dscUf == 'CE' ? 'selected=\'selected\'':'' ?>>CE</option>
						<option value="DF" <?= $usuario->dscUf == 'DF' ? 'selected=\'selected\'':'' ?>>DF</option>
						<option value="ES" <?= $usuario->dscUf == 'ES' ? 'selected=\'selected\'':'' ?>>ES</option>
						<option value="GO" <?= $usuario->dscUf == 'GO' ? 'selected=\'selected\'':'' ?>>GO</option>
						<option value="MA" <?= $usuario->dscUf == 'MA' ? 'selected=\'selected\'':'' ?>>MA</option>
						<option value="MT" <?= $usuario->dscUf == 'MT' ? 'selected=\'selected\'':'' ?>>MT</option>
						<option value="MS" <?= $usuario->dscUf == 'MS' ? 'selected=\'selected\'':'' ?>>MS</option>
						<option value="MG" <?= $usuario->dscUf == 'MG' ? 'selected=\'selected\'':'' ?>>MG</option>
						<option value="PA" <?= $usuario->dscUf == 'PA' ? 'selected=\'selected\'':'' ?>>PA</option>
						<option value="PB" <?= $usuario->dscUf == 'PB' ? 'selected=\'selected\'':'' ?>>PB</option>
						<option value="PR" <?= $usuario->dscUf == 'PR' ? 'selected=\'selected\'':'' ?>>PR</option>
						<option value="PE" <?= $usuario->dscUf == 'PE' ? 'selected=\'selected\'':'' ?>>PE</option>
						<option value="PI" <?= $usuario->dscUf == 'PI' ? 'selected=\'selected\'':'' ?>>PI</option>
						<option value="RR" <?= $usuario->dscUf == 'RR' ? 'selected=\'selected\'':'' ?>>RR</option>
						<option value="RO" <?= $usuario->dscUf == 'RO' ? 'selected=\'selected\'':'' ?>>RO</option>
						<option value="RJ" <?= $usuario->dscUf == 'RJ' ? 'selected=\'selected\'':'' ?>>RJ</option>
						<option value="RN" <?= $usuario->dscUf == 'RN' ? 'selected=\'selected\'':'' ?>>RN</option>
						<option value="RS" <?= $usuario->dscUf == 'RS' ? 'selected=\'selected\'':'' ?>>RS</option>
						<option value="SC" <?= $usuario->dscUf == 'SC' ? 'selected=\'selected\'':'' ?>>SC</option>
						<option value="SP" <?= $usuario->dscUf == 'SP' ? 'selected=\'selected\'':'' ?>>SP</option>
						<option value="SE" <?= $usuario->dscUf == 'SE' ? 'selected=\'selected\'':'' ?>>SE</option>
						<option value="TO" <?= $usuario->dscUf == 'TO' ? 'selected=\'selected\'':'' ?>>TO</option>
					</select>
				</p>
				<p class="estado">Administrador?<br />
					<select id="admin" name="admin">
						<option value="1" <?= $usuario->staAdmin == 1 ? 'selected=\'selected\'':'' ?>>Sim</option>
						<option value="0" <?= $usuario->staAdmin == 0 ? 'selected=\'selected\'':'' ?>>Não</option>
					</select>
					
				</p>
				
				<p>
				
					<input type="button" value="Voltar" onclick="javascript:window.location='usuario.php';" />
				</p>
				
				<p>
				
					<input type="submit" value="Alterar" />
				</p>
				<input type="hidden" value="<?= $usuario->seqUsuario ?>" id="seqUsuario" name="seqUsuario" />
				<input type="hidden" value="<?= $usuario->dscSenhaUsuario?>" id="senha" name="senha" />
				<input type="hidden" value="<?= $usuario->dscPais?>" id="pais" name="pais" />
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
		
	