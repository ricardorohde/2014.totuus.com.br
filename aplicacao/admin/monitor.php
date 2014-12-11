<?php 
session_start();

require_once("../classes/br.com.totuus/CameraManager.php");

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
<script type="text/javascript" src="../../js/dataTables.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.columnFilter.js"></script>

<!-- Google Analytics -->
<script type="text/javascript">
 /*
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30032054-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 */
</script>
<script language="javascript">

function lockupCamera(idCamera) {
	$.get("monitorAction.php?method=lockup&idCamera="+idCamera,{}, function(data) {
		
		var codigo = $(data).find("codigo").text();
		
		if(codigo == 'success') {
			$("#imgMonitor"+idCamera).attr('src', '../../images/CamON.png');
		} else {
			$("#imgMonitor"+idCamera).attr('src', '../../images/CamOFF.png');
		}
		
	});
	
	//getDataAtual();
}

function getDataAtual() { 

	var data = new Date();
	var dia     = data.getDate();           // 1-31
	var dia_sem = data.getDay();            // 0-6 (zero=domingo)
	var mes     = data.getMonth();          // 0-11 (zero=janeiro)
	var ano2    = data.getYear();           // 2 dígitos
	var ano4    = data.getFullYear();       // 4 dígitos
	var hora    = data.getHours();          // 0-23
	var minu     = data.getMinutes();        // 0-59
	var seg     = data.getSeconds();        // 0-59
	var mseg    = data.getMilliseconds();   // 0-999
	var tz      = data.getTimezoneOffset(); // em minutos

	var str_data = dia + '/' + (mes+1) + '/' + ano4;
	var str_hora = hora + ':' + minu + ':' + seg;
	
	//alert(str_data);
	
	$("span[name='dataAtualizacao']").html(str_data + ' às ' + str_hora);

}

function loadAllCameras() {
	setInterval(function(){
		<?php
						
			$cameraManager = new CameraManager();
			$cameras = $cameraManager->findAll();
			
			while($camera = mysql_fetch_array($cameras))
			{	
				echo "lockupCamera(".$camera['seq_camera'].");\n";
			}
		
		?>
		getDataAtual();
	
	}, 60000);
}

setTimeout("loadAllCameras();", 1000);


$(document).ready(function (){

	$("#tableCameras").dataTable().columnFilter();

});




</script>
<body onload="getDataAtual();">

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
		
		
		<!-- CORPO -->
		<div class="Content" style="margin-left: 5px;">
		   
			<div id="bodyContainer">
				
				<h2>Monitor</h2>
				<div style="text-align:right; padding-right: 15px;"><span>Última atualização em: </span><span name="dataAtualizacao"></span></div>
				
				<table cellspacing="0" id="tableCameras">
					<tbody>
					<?php
					
						$cameraManager = new CameraManager();
						$cameras = $cameraManager->findAll();
						
						while($camera = mysql_fetch_array($cameras))
						{	
							echo "<tr name='".$camera['dsc_cliente']."'><td>". $camera['dsc_cliente']."</td><td>". $camera['dsc_nome_camera'] ."</td><td>".$camera['dsc_modelo']."</td>
							<td><img src='../../images/CamLoading.png' height='25' id='imgMonitor".$camera['seq_camera']."' name='imgMonitor".$camera['seq_camera']."'></td></tr>";
						}
					
					?>
				
				</tbody>
				<thead>
				
					<tr>
					
						<th>Cliente</th>
						<th>Câmera</th>
						<th>Modelo</th>
						<th>Status</th>
					
					</tr>
				
				</thead>
					
				<tfoot>
				
					<tr>
					
						<th>Cliente</th>
						<th>Câmera</th>
						<th>Modelo</th>
						<th>Status</th>
					
					</tr>
				
				</tfoot>
				</table>
				
				<div style="text-align:right; padding-right: 15px;"><span>Última atualização em: </span><span name="dataAtualizacao">12/12/1212 12:12:12</span></div>
				
			</div>
			
		</div>
		
		<br class="Clear" />
        
		<!-- FOOTER -->
		<div id="Footer">
			
		
			<div style="padding-left: 470px; float: right;">Copyright &copy; 2012 Totuus. Todos os Direitos Reservados.</div>
			
		</div>

	
	</div>
</body>   
</html>
		
	