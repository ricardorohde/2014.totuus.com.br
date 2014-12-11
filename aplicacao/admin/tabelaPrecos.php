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

function excluirUsuario(id, nome) {

	if(confirm('Deseja excluir o usuário ' + nome)) {
	
		window.location = '../../aplicacao/actions/usuarioAction.php?method=excluirUsuario&idUsuario='+id;
	
	}

}


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
				<table cellspacing="0">
					<tr>
						<th>Modelo</th>
						<th>Preço sugerido FOSCAM</th>
						<th>Preço Totuus</th>
						<th>Preço Totuus com desconto 10%</th>
					</tr>
				
					<tr>
						<td>FI8620</td>
						<td>R$ 2.691,00</td>
						<td>R$ 2.085,43</td>
						<td>R$ 1.876,89</td>
					</tr>
					
					<tr>
						<td>FI8904W</td>
						<td>R$ 550,44</td>
						<td>R$ 436,04</td>
						<td>R$ 392,43</td>
					</tr>
					
					<tr>
						<td>FI8905E</td>
						<td>R$ 631,35</td>
						<td>R$ 498,38</td>
						<td>R$ 448,54</td>
					</tr>
					
					<tr>
						<td>FI8905W</td>
						<td>R$ 604,08</td>
						<td>R$ 477,62</td>
						<td>R$ 429,86</td>
					</tr>
					
					<tr>
						<td>FI8906W</td>
						<td>R$ 644,40</td>
						<td>R$ 508,87</td>
						<td>R$ 457,98</td>
					</tr>
					
					<tr>
						<td>FI8907W</td>
						<td>R$ 430,20</td>
						<td>R$ 342,68</td>
						<td>R$ 308,41</td>
					</tr>
					
					<tr>
						<td>FI8908W</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
					</tr>
					
					<tr>
						<td>FI8909W</td>
						<td>R$ 363,15</td>
						<td>R$ 290,82</td>
						<td>R$ 261,74</td>
					</tr>
					
					<tr>
						<td>FI8910E</td>
						<td>R$ 538,20</td>
						<td>R$ 425,62</td>
						<td>R$ 383,06</td>
					</tr>
					
					<tr>
						<td>FI8910W</td>
						<td>R$ 538,20</td>
						<td>R$ 442,50</td>
						<td>R$ 398,25</td>
					</tr>
					
					<tr>
						<td>FI8916W</td>
						<td>R$ 524,70</td>
						<td>R$ 415,28</td>
						<td>R$ 373,75</td>
					</tr>
					
					<tr>
						<td>FI8918E</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
					</tr>
					
					<tr>
						<td>FI8918W</td>
						<td>R$ 524,70</td>
						<td>R$ 353,01</td>
						<td>R$ 317,71</td>
					</tr>
					
					<tr>
						<td>FI8919W</td>
						<td>R$ 981,00</td>
						<td>R$ 768,04</td>
						<td>R$ 691,24</td>
					</tr>
					
					<tr>
						<td>FI9804W</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
					</tr>
					
					<tr>
						<td>FI9805W</td>
						<td>R$ 1.048,50</td>
						<td>R$ 819,97</td>
						<td>R$ 737,97</td>
					</tr>
					
					<tr>
						<td>FI9821W</td>
						<td>R$ 779,40</td>
						<td>R$ 612,42</td>
						<td>R$ 551,18</td>
					</tr>
					
					
				
					
				
				</table>
				
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
		
	