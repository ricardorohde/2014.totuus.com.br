<?php 

session_start();

include("../../conectar.php");

$method =  $_REQUEST['method'];

require_once ("../classes/Encrypt.php");
require_once ("../classes/NotificacaoManager.php");

$notificacaoManager = new NotificacaoManager();

switch ($method) {
	
	case "getQtdNotificacoesNaoLidas" :
	
		$notificacoes = $notificacaoManager->getQtdNotificacoesNaoLidas($_SESSION["idUsuarioAdmin"]);
						
		while($qtd = mysql_fetch_array($notificacoes))
		{
			echo $qtd['quantidade'];
		}	
	
	break;
	
	case "getListaNotificacoes" :
	
		$notificacoes = $notificacaoManager->getListaNotificacoes($_SESSION["idUsuarioAdmin"]);
		
		$lista = "<ul id='listaNotificacoes'>";
						
		while($notificacao = mysql_fetch_array($notificacoes))
		{
			$lista .= "<li><h1>".$notificacao['dsc_titulo_notificacao']."</h1><check></check><p>".$notificacao['dsc_notificacao']."</p></li>";
		}
	
		$lista .= "</ul>";
	
		echo utf8_encode($lista);
		
	break;
	
	case "updateQtdNotificacoes" :
	
		$notificacaoManager->updateQtdNotificacoes($_SESSION["idUsuarioAdmin"]);
		
	break;

}







?>
