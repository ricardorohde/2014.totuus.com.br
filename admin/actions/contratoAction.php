<?php 

session_start();

include("../../conectar.php");

$method =  $_REQUEST['method'];

require_once ("../classes/ContratoManager.php");
require_once ("../classes/UsuarioManager.php");
require_once ("../classes/PagamentoManager.php");
require_once ("../classes/Encrypt.php");

$contratoManager = new ContratoManager();
$usuarioManager = new UsuarioManager();
$pagamentoManager = new PagamentoManager();
$encrypt = new Encrypt();

switch ($method) {
	
	case "getListaContratos" :
		
		$contratos = $contratoManager->findAll();
						
		while($contrato = mysql_fetch_array($contratos))
		{
			$usuario = $usuarioManager->findById($contrato['seq_usuario']);
			
			$dataInicio = date_create($contrato['dat_inicio']);
			  
			date_format($dataInicio, 'd/m/Y');  
			
			$pagamento;
			
			switch ($contrato['num_forma_pagamento']) {
				case 1:
					$pagamento = 'Boleto';
				break;
				
				case 2:
					$pagamento = 'Carn&ecirc;';
				break;
				
				case 3:
					$pagamento = 'Cart&atilde;o';
				break;
			}
			
			
			echo "<tr><td class='description'>" .$contrato['num_contrato']. "</td><td class='value'>" .utf8_encode($usuario->dscNomUsuario) ."  </td><td class='value'>" . date_format($dataInicio, 'd/m/Y') ."</td><td class='value'>" . $contrato['num_meses_validade']."</td><td class='value'>" . $pagamento."</td><td class='value'>" . $contrato['num_dia_vencimento']."</td><td class='value' align='center'>".$contrato['vlr_contrato']."</td><td class='value' align='center'><a href='#' class='btn btn-default icon-exchange' onclick='prepararAlterarContrato(" .$contrato['seq_contrato'].");' ></a><a href='#' class='btn btn-default icon-trash' onclick='confirmaExcluirContrato(".$contrato['seq_contrato'].");'></a></td>/tr>";
		}	
	
	break;
	
	case "getQtdContratos" :
	
		$contratos = $contratoManager->countContratos();
						
		while($contrato = mysql_fetch_array($contratos))
		{
			echo "<div class='stat'><h4>Localiza&ccedil;&atilde;o</h4><span class='value'>" .$contrato["qtd_localizacao"] . "</span></div><div class='stat'><h4>Monitoramento</h4><span class='value'>" . $contrato["qtd_monitoramento"] . "</span></div><div class='stat'><h4>Dyn DNS</h4><span class='value'>" . $contrato["qtd_dns"] . "</span></div>";
		}	
	
	break;
	
	case "inserirContrato" :
	
		
		$contrato = new Contrato();
		
		$contrato->numContrato = $_REQUEST['numContrato'];
		$contrato->datInicio = $_REQUEST['datInicio'];
		$contrato->numMesesValidade = $_REQUEST['numMesesValidade'];
		$contrato->numFormaPagamento = $_REQUEST['numFormaPagamento'];
		$contrato->numDiaVencimento = $_REQUEST['numDiaVencimento'];
		$contrato->seqServico = $_REQUEST['seqServico'];
		$contrato->seqUsuario = $_REQUEST['seqUsuario'];
		$contrato->dscObservacao = $_REQUEST['dscObservacao'];   
		$contrato->vlrContrato = $_REQUEST['vlrContrato'];   
		
		$contratoManager->save($contrato);
		
		if($contrato->numFormaPagamento != 3) {
		
			$contrato = $contratoManager->findById($contratoManager->selectMaxId());
		
			$pagamentoManager->gerarPagamentos($contrato->seqContrato);
		}
	
	break;
	
	case "selecionarContratoPorId" :
	
		$contrato = new Contrato();
		
		$contrato = $contratoManager->findById($_REQUEST['seqContrato']);
		
		$dataInicio = date_create($contrato->datInicio);
		
		echo "<contrato>" .
				"<seqContrato>".$contrato->seqContrato."</seqContrato>".
				"<seqUsuario>".$contrato->seqUsuario."</seqUsuario>".
				"<seqServico>".$contrato->seqServico."</seqServico>".
				"<numContrato>".$contrato->numContrato."</numContrato>".
				"<datInicio>".date_format($dataInicio, 'd/m/Y')."</datInicio>".
				"<numMesesValidade>". $contrato->numMesesValidade."</numMesesValidade>".
				"<numFormaPagamento>".$contrato->numFormaPagamento."</numFormaPagamento>".
				"<numDiaVencimento>".$contrato->numDiaVencimento."</numDiaVencimento>".
				"<vlrContrato>".$contrato->vlrContrato."</vlrContrato>".
				"<dscObservacao>".$contrato->dscObservacao."</dscObservacao>".
			 "</contrato>";
		
	break;
	
	case "atualizarContrato" :
	
		
		$contrato = new Contrato();
		
		$contrato->seqContrato = $_REQUEST['seqContrato'];
		$contrato->numContrato = $_REQUEST['numContrato'];
		$contrato->datInicio = $_REQUEST['datInicio'];
		$contrato->numMesesValidade = $_REQUEST['numMesesValidade'];
		$contrato->numFormaPagamento = $_REQUEST['numFormaPagamento'];
		$contrato->numDiaVencimento = $_REQUEST['numDiaVencimento'];
		$contrato->seqServico = $_REQUEST['seqServico'];
		$contrato->seqUsuario = $_REQUEST['seqUsuario'];
		$contrato->vlrContrato = $_REQUEST['vlrContrato'];
		$contrato->dscObservacao = $_REQUEST['dscObservacao'];   
		
		$contratoManager->update($contrato);
						
	
	break;
	
	case "excluirContrato" :
	
		$contratoManager->delete($_REQUEST['seqContrato']);
		$pagamentoManager->deleteBySeqContrato($_REQUEST['seqContrato']);
	
	break;
	
	case "getNumeroContratoDataAtual" :
		
		echo "<dados><numContrato>".$contratoManager->gerarNumeroContrato()."</numContrato><datInicio>".date('d/m/Y') ."</datInicio></dados>";
	
	break;
}



?>
