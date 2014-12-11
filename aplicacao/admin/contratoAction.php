<?php 

session_start();

$method =  $_REQUEST['method'];
require_once("../classes/br.com.totuus/ContratoManager.php");
require_once("../classes/br.com.totuus/UsuarioContratoManager.php");
require_once("../classes/br.com.totuus/ContratoServicoManager.php");

switch ($method) {

	case "inserirContrato" :
		
		$contrato = new Contrato();
		$contratoManager = new ContratoManager();
		
		$contrato->seqUsuarioResponsavel = $_REQUEST['seqUsuarioResponsavel'];
		$contrato->seqServico = $_REQUEST['seqServico'];
		$contrato->numContrato = $_REQUEST['numContrato'];
		$contrato->datInicio = $_REQUEST['datInicio'];
		$contrato->numMesesValidade = $_REQUEST['numMesesValidade'];
		$contrato->dscObservacao = $_REQUEST['dscObservacao'];

		$contratoManager->save($contrato);
		
		$usuarioContrato = new UsuarioContrato();
		$usuarioContratoManager = new UsuarioContratoManager(); 
		
		$usuarioContrato->seqUsuario = $_REQUEST['seqUsuarioResponsavel'];
		$usuarioContrato->seqContrato = $contratoManager->findMaxSeqContrato();
		$usuarioContratoManager->save($usuarioContrato);
		
		$contratoServico = new ContratoServico();
		$contratoServicoManager = new ContratoServicoManager();
		
		$contratoServico->seqContrato = $contratoManager->findMaxSeqContrato();
		$contratoServico->seqServico = $_REQUEST['seqServico'];
		
		if($_REQUEST['seqServico'] == '1')
			$contratoServico->dscUrlServico = 'aplicacao/redirGpsGate.php';
		else
			$contratoServico->dscUrlServico = $_REQUEST['dscUrlServico'];
			
		$contratoServicoManager->save($contratoServico);
		
		echo "<script>window.location = 'contrato.php';</script>";
		
			
	
	break;
	
	case "excluirContrato" :
		
		$contratoManager = new ContratoManager();
		$contratoManager->delete($_REQUEST['idContrato']);
		
		echo "<script>window.location = 'contrato.php';</script>";
		
			
	
	break;
	
	case "alterarContrato" :
		
		try {
		$contrato = new Contrato();
		$contratoManager = new ContratoManager();
		
		$contrato->seqContrato = $_REQUEST['seqContrato'];
		$contrato->seqUsuarioResponsavel = $_REQUEST['seqUsuarioResponsavel'];
		$contrato->seqServico = $_REQUEST['seqServico'];
		$contrato->numContrato = $_REQUEST['numContrato'];
		$contrato->datInicio = $_REQUEST['datInicio'];
		$contrato->numMesesValidade = $_REQUEST['numMesesValidade'];
		$contrato->dscObservacao = $_REQUEST['dscObservacao'];

		$contratoManager->update($contrato);
		
		
		echo "<script>window.location = 'alterarContrato.php?seqContrato=".$contrato->seqContrato."&sta=success';</script>";
		
		} catch(Exception $e) {
			echo "<script>window.location = 'alterarContrato.php?seqContrato=".$contrato->seqContrato."&sta=error';</script>";
		}
			
	
	break;

}





?>
