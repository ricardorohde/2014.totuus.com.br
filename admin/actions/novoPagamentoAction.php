<?php 

session_start();

include("../../conectar.php");

$method =  $_REQUEST['method'];

require_once ("../classes/PagamentoAvulsoManager.php");
require_once ("../classes/UsuarioManager.php");
require_once ("../classes/Encrypt.php");

$pagamentoAvulsoManager = new PagamentoAvulsoManager();

switch ($method) {
	
	
	// PAGAMENTOS AVULSOS
	
	
	case "getListaClientes" :
		
		$usuarioManager = new UsuarioManager();
		
		$usuarios = $usuarioManager->findAll();
						
		$response = "<option value=''>Selecione um cliente</option>";

		while($usuario = mysql_fetch_array($usuarios))
		{
			$response .= "<option value='".$usuario['seq_usuario']."'>".utf8_encode($usuario['dsc_nom_usuario'])."</option>";
		}	
		
		echo $response;
	
	break;
	
	case "inserirPagamentoAvulso" :
		
		$dia = substr($_REQUEST['datPagamento'], 0,2);
		$mes = substr($_REQUEST['datPagamento'], 3,2);
		$ano = substr($_REQUEST['datPagamento'], 6,4);
		
		
		for($i = 0; $i < $_REQUEST['qtdMeses']; $i++) {
					
			$proximaData = mktime(0,0,0, $mes + $i, $dia, $ano);
			
			$pagamentoAvulso = new PagamentoAvulso();
		
			$pagamentoAvulso->seqUsuario = $_REQUEST['seqUsuario'];   
			$pagamentoAvulso->datPagamento = date('d/m/Y', $proximaData);  
			$pagamentoAvulso->dscObservacao = $_REQUEST['dscObservacao'];
			$pagamentoAvulso->vlrPagamento = floatval($_REQUEST['vlrPagamento']);
			$pagamentoAvulso->staPagamento = 1;
		
			$pagamentoAvulsoManager->save($pagamentoAvulso);
		}
	
	break;
	
	
}

?>
