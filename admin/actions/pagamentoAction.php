<?php 

session_start();

include("../../conectar.php");

$method =  $_REQUEST['method'];

require_once ("../classes/PagamentoManager.php");
require_once ("../classes/PagamentoAvulsoManager.php");
require_once ("../classes/UsuarioManager.php");
require_once ("../classes/Encrypt.php");

$pagamentoManager = new PagamentoManager();
$pagamentoAvulsoManager = new PagamentoAvulsoManager();

switch ($method) {
	
	case "getListaPagamentosMesCorrente" :
		
		$pagamentos = $pagamentoManager->findPagamentosMesCorrente();
						
		while($pagamento = mysql_fetch_array($pagamentos))
		{
			$dataPagamento = date_create($pagamento['dat_pagamento']);
			
			$status = "Em aberto";
			
			if($pagamento['sta_pagamento'] == 2)
				$status = "Relizado";
			
			
			echo "<tr><td class='description'>" .utf8_encode($pagamento['nom_usuario']). "</td><td class='value'>" .$pagamento['num_contrato']." </td><td class='value'>"  .date_format($dataPagamento, 'd/m/Y') ."</td><td class='value'>"  .$status."</td><td class='value'>"  .$pagamento['vlr_contrato']."</td><td class='value' align='center'><a href='#' class='btn btn-default icon-exchange' onclick='confirmaMudarStatusPagamento(".$pagamento['seq_pagamento'].");' ></a></td></tr>";
		}	
	
	break;
	
	case "getQtdPagamentos" :
	
		$pagamentos = $pagamentoManager->countPagamentos();
						
		while($pagamento = mysql_fetch_array($pagamentos))
		{
			echo "<div class='stat'><h4>Pagamentos realizados</h4><span class='value'>" .$pagamento["qtd_realizados"] . "</span></div><div class='stat'><h4>Pagamentos em aberto</h4><span class='value'>" . $pagamento["qtd_abertos"] . "</span></div>";
		}	
	
	break;
	
	case "mudarStatusPagamento" :
	
		$pagamentoManager->mudarStatusPagamento($_REQUEST['seqPagamento']);
	
	break;
	
	case "getListaPagamentosAvulsosMesCorrente" :
		
		$pagamentosAvulsos = $pagamentoAvulsoManager->findPagamentosAvulsosMesCorrente();
						
		while($pagamentoAvulso = mysql_fetch_array($pagamentosAvulsos))
		{
			$dataPagamentoAvulso = date_create($pagamentoAvulso['dat_pagamento']);
			
			$status = "Em aberto";
			
			if($pagamentoAvulso['sta_pagamento'] == 2)
				$status = "Relizado";
			
			
			echo "<tr><td class='description'>" .utf8_encode($pagamentoAvulso['nom_usuario']). "</td><td class='value'>" .date_format($dataPagamentoAvulso, 'd/m/Y')." </td><td class='value'>"  .$status . "</td><td class='value'>".$pagamentoAvulso['vlr_pagamento']."</td><td class='value' align='center'><a href='#' class='btn btn-default icon-exchange' onclick='confirmaMudarStatusPagamento(".$pagamentoAvulso['seq_pagamento'].");' ></a></td></tr>";
		}	
	
	break;
	
	
//	case "inserirUsuario" :
//	
//		
//		$usuario = new Usuario();
//		
//		$usuario->nomUsuarioGpsgate = $_REQUEST['nomUsuarioGpsgate'];   
//		$usuario->dscNomUsuario = utf8_decode($_REQUEST['dscNomUsuario']);  
//		$usuario->dscEmailUsuario = $_REQUEST['dscEmailUsuario'];
//		$usuario->dscSenhaUsuario = utf8_decode($encrypt->criptografar($_REQUEST['dscSenhaUsuario']));
//		$usuario->dscEndereco = utf8_decode($_REQUEST['dscEndereco']);
//		$usuario->dscComplemento = utf8_decode($_REQUEST['dscComplemento']);
//		$usuario->dscCep = $_REQUEST['dscCep'];
//		$usuario->dscUf = $_REQUEST['dscUf'];
//		$usuario->dscCidade = utf8_decode($_REQUEST['dscCidade']);
//		$usuario->numTelefone = $_REQUEST['numTelefone'];
//		$usuario->numFoneCelular = $_REQUEST['numFoneCelular'];
//		$usuario->codCpfCnpj = $_REQUEST['codCpfCnpj'];
//		$usuario->datNascimento = $_REQUEST['datNascimento'];
//		$usuario->staAdmin = $_REQUEST['staAdmin'];
//		$usuario->numAppGpsgate = $_REQUEST['numAppGpsgate'];
//		
//		$usuarios = $usuarioManager->save($usuario);
//						
//	
//	break;
//	
//	case "selecionarUsuarioPorId" :
//	
//		$usuario = new Usuario();
//		
//		$usuario = $usuarioManager->findById($_REQUEST['seqUsuario']);
//		
//		echo "<usuario>" .
//				"<seqUsuario>".$usuario->seqUsuario."</seqUsuario>".
//				"<nomUsuarioGpsgate>".$usuario->nomUsuarioGpsgate."</nomUsuarioGpsgate>".
//				"<dscNomUsuario>".utf8_encode($usuario->dscNomUsuario)."</dscNomUsuario>".
//				"<dscEmailUsuario>".$usuario->dscEmailUsuario."</dscEmailUsuario>".
//				"<dscSenhaUsuario>".utf8_encode($encrypt->decriptografar($usuario->dscSenhaUsuario))."</dscSenhaUsuario>".
//				"<dscEndereco>".utf8_encode($usuario->dscEndereco) ."</dscEndereco>".
//				"<dscComplemento>".utf8_encode($usuario->dscComplemento)."</dscComplemento>".
//				"<dscCep>".$usuario->dscCep."</dscCep>".
//				"<dscUf>".$usuario->dscUf."</dscUf>".
//				"<dscCidade>".utf8_encode($usuario->dscCidade)."</dscCidade>".
//				"<numTelefone>".$usuario->numTelefone."</numTelefone>".
//				"<numFoneCelular>".$usuario->numFoneCelular."</numFoneCelular>".
//				"<codCpfCnpj>".$usuario->codCpfCnpj."</codCpfCnpj>".
//				"<datNascimento>".$usuario->datNascimento."</datNascimento>".
//				"<staAdmin>".$usuario->staAdmin."</staAdmin>".
//				"<numAppGpsgate>".$usuario->numAppGpsgate."</numAppGpsgate>".
//			 "</usuario>";
//		
//	break;
//	
//	case "atualizarUsuario" :
//	
//		
//		$usuario = new Usuario();
//		
//		$usuario->nomUsuarioGpsgate = $_REQUEST['nomUsuarioGpsgate'];   
//		$usuario->dscNomUsuario = utf8_decode($_REQUEST['dscNomUsuario']);  
//		$usuario->dscEmailUsuario = $_REQUEST['dscEmailUsuario'];
//		$usuario->dscSenhaUsuario = utf8_decode($encrypt->criptografar($_REQUEST['dscSenhaUsuario']));
//		$usuario->dscEndereco = utf8_decode($_REQUEST['dscEndereco']);
//		$usuario->dscComplemento = utf8_decode($_REQUEST['dscComplemento']);
//		$usuario->dscCep = $_REQUEST['dscCep'];
//		$usuario->dscUf = $_REQUEST['dscUf'];
//		$usuario->dscCidade = utf8_decode($_REQUEST['dscCidade']);
//		$usuario->numTelefone = $_REQUEST['numTelefone'];
//		$usuario->numFoneCelular = $_REQUEST['numFoneCelular'];
//		$usuario->codCpfCnpj = $_REQUEST['codCpfCnpj'];
//		$usuario->datNascimento = $_REQUEST['datNascimento'];
//		$usuario->staAdmin = $_REQUEST['staAdmin'];
//		$usuario->numAppGpsgate = $_REQUEST['numAppGpsgate'];
//		$usuario->seqUsuario = $_REQUEST['seqUsuario'];
//		
//		$usuarios = $usuarioManager->update($usuario);
//						
//	
//	break;
//	
//	case "excluirUsuario" :
//	
//		$usuarioManager->delete($_REQUEST['seqUsuario']);
//	
//	break;
}

?>
