<?php 
session_start();

require_once("../classes/br.com.totuus/ContratoManager.php");
require_once("../classes/br.com.totuus/ServicoManager.php");
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
      <div id="Logo"> <a href="contrato/index.php"><img src="../../images/LogoTotuus.png" border="0" id="LogoImage" alt="Totuus - Localização e Monitoramento" /></a> </div>
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
    <div id="msgImage"><img src="../../images/success-icon.png" alt="Icone Sucesso" width="30" height="30" id="iconMsg" /></div>
    <div id="msgRetorno">Contrato alterado com sucesso.</div>
  </div>
  <!-- CORPO -->
  <div class="Content" style="margin-left: 5px;">
    <div id="bodyContainer">
      <h2>Controle de Contratos</h2>
      <?php
				
					$contratoManager = new ContratoManager();
					$contrato = $contratoManager->findById($_REQUEST['seqContrato']);
				
				?>
      <form action="contratoAction.php?method=alterarContrato" method="post" class="wpcf7-form">
      <div style="width: 488px; float: left;">
        <p class="">Número<br />
            <input type="text" class="inputFormContato" value="<?=$contrato->numContrato?>" size="40" id="numContrato" name="numContrato"/>
        </p>
        <p class="" >Data de Início<br />
            <input type="text" class="inputFormContato" value="<?=$contrato->datInicio?>" size="40" id="datInicio" name="datInicio"/>
        </p>
        <p class="">Serviço<br />
            <select id="seqServico" name="seqServico">
              <?php 
							
								$servicoManager = new ServicoManager();
								$servicos = $servicoManager->findAll();
								
								while($servico = mysql_fetch_array($servicos)){
								
									if($contrato->seqServico == $servico['seq_servico'])
										echo "<option value=\"".$servico['seq_servico']."\" selected=\"selected\" >".$servico['dsc_servico']."</option>";
									else
										echo "<option value=\"".$servico['seq_servico']."\">".$servico['dsc_servico']."</option>";
								}
							
							?>
            </select>
        </p>
        <p class="">Validade<br />
            <select id="numMesesValidade" name="numMesesValidade">
              <option value="12" <?= $contrato->numMesesValidade == 12 ? 'selected=\'selected\'':'' ?>>12</option>
              <option value="24" <?= $contrato->numMesesValidade == 24 ? 'selected=\'selected\'':'' ?>>24</option>
              <option value="36" <?= $contrato->numMesesValidade == 36 ? 'selected=\'selected\'':'' ?>>36</option>
            </select>
        </p>
        <p class="">Usuário Responsável<br />
            <select id="seqUsuarioResponsavel" name="seqUsuarioResponsavel">
              <?php 
							
								$usuarioManager = new UsuarioManager();
								$usuarios = $usuarioManager->findAll();
								
								while($usuario = mysql_fetch_array($usuarios)){
									
									if($contrato->seqUsuarioResponsavel == $usuario['seq_usuario'])
										echo "<option value=\"".$usuario['seq_usuario']."\" selected=\"selected\">".$usuario['dsc_nom_usuario']."</option>";
									else
										echo "<option value=\"".$usuario['seq_usuario']."\">".$usuario['dsc_nom_usuario']."</option>";
								
								}
							
							?>
            </select>
        </p>
      </div>
      <div style="width: 100px; float: left; padding-top:11px;">
      <table style="width:480px;" cellpadding="0" cellspacing="0">
      <tr>
        <th> <div style="text-align:left; padding-left:10px; padding-right: 288px;float:left;">Usuários do contrato</div>
            <div style="text-align:right; padding-left:10px; float:left;">
        </th>
      </tr>
      <form>
        <input name="button" type="button" style="padding: 0px; margin: 0px;" value="+"/>
      </form>
    </div>
    </th>
    </tr>
    <?php 
					
						$usuarioManager = new UsuarioManager();
						$usuarios = $usuarioManager->findUsuariosByIdContrato($contrato->seqContrato);
					
						while($usuario = mysql_fetch_array($usuarios)){
							echo "<tr><td style='text-align: left; padding-left: 15px;'>".$usuario['dsc_nom_usuario']."</td></tr>";
						}
					
					?>
    </table>
  </div>
  <p class="mensagem">Observações<br />
      <textarea cols="40" rows="10" class="textareaFormContato"  id="dscObservacao" name="dscObservacao" ><?=$contrato->dscObservacao?>
  </textarea>
  </p>
  <input type="hidden" value="<?=$contrato->seqContrato?>" id="seqContrato" name="seqContrato"/>
  <p>
    <input name="button" type="button" onclick="javascript:window.location='contrato.php';" value="Voltar" />
  </p>
  <p>
    <input name="submit" type="submit" value="Alterar" />
  </p>
  </form>
</div>
</div>
<br class="Clear" />
<!-- FOOTER -->
<div id="Footer">
  <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.totuus.com.br&amp;send=false&amp;layout=button_count&amp;width=135&amp;show_faces=true&amp;action=recommend&amp;colorscheme=light&amp;font=verdana&amp;height=21&amp;locale=pt_BR" scrolling="No" frameborder="0" style="border:none; overflow:hidden; width:180px; height:21px;" allowtransparency="true"></iframe>
  <div style="padding-left: 470px; float: right;">Copyright &copy; 2012 Totuus. Todos os Direitos Reservados.</div>
</div>
</div>

</body>   
</html>
		
	