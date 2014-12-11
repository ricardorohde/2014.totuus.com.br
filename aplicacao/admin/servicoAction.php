<?php 

session_start();

$method =  $_REQUEST['method'];
require_once("../classes/br.com.totuus/ServicoManager.php");

switch ($method) {

	case "inserirServico" :
		
		$servico = new Servico();
		$servicoManager = new ServicoManager();

		
		$servico->dscServico = $_REQUEST['dscServico'];
		
		$servicoManager->save($servico);
		
		
		echo "<script>window.location = 'servico.php';</script>";
		
			
	
	break;
	
	case "excluirServico" :
		
		$servico = new Servico();
		$servicoManager = new ServicoManager();
		$servicoManager->delete($_REQUEST['idServico']);
		
		echo "<script>window.location = 'servico.php';</script>";
		
			
	
	break;
	
	case "alterarServico" :
		
		try {
		$servico = new Servico();
		$servicoManager = new ServicoManager();

		$servico->dscServico = $_REQUEST['dscServico']; 
		
		$servico->seqServico = $_REQUEST['seqServico']; 
		
		$servicoManager->update($servico);
		
		
		echo "<script>window.location = 'alterarServico.php?seqServico=".$servico->seqServico."&sta=success';</script>";
		
		} catch(Exception $e) {
			echo "<script>window.location = 'alterarServico.php?seqServico=".$servico->seqServico."&sta=error';</script>";
		}
			
	
	break;

}





?>
