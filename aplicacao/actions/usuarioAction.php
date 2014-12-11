<?php 

session_start();

$method =  $_REQUEST['method'];
require_once("../classes/br.com.totuus/UsuarioManager.php");

switch ($method) {

	case "inserirUsuario" :
		
		$usuario = new Usuario();
		$usuarioManager = new UsuarioManager();

		
		$usuario->nomUsuarioGpsgate = $_REQUEST['usuarioGPSGate'];
		$usuario->dscNomUsuario = $_REQUEST['nome'];
		$usuario->dscEmailUsuario = $_REQUEST['email'];
		$usuario->dscSenhaUsuario = $_REQUEST['senha'];
		$usuario->dscEndereco = $_REQUEST['endereco'];
		$usuario->dscComplemento = $_REQUEST['complemento'];
		$usuario->dscCep = $_REQUEST['cep'];
		$usuario->dscUf = $_REQUEST['estado'];
		$usuario->dscCidade = $_REQUEST['cidade'];
		$usuario->numTelefone = $_REQUEST['fone'];
		$usuario->numFoneCelular = $_REQUEST['celular'];
		$usuario->codCpfCnpj = $_REQUEST['cpfCnpj'];
		$usuario->datNascimento = $_REQUEST['dataNascimento'];
		$usuario->staAdmin = $_REQUEST['admin']; 
		
		$usuarioManager->save($usuario);
		
		
		echo "<script>window.location = '../admin/usuario.php';</script>";
		
			
	
	break;
	
	case "excluirUsuario" :
		
		$usuario = new Usuario();
		$usuarioManager = new UsuarioManager();
		$usuarioManager->delete($_REQUEST['idUsuario']);
		
		echo "<script>window.location = '../admin/usuario.php';</script>";
		
			
	
	break;
	
	case "alterarUsuario" :
		
		try {
		$usuario = new Usuario();
		$usuarioManager = new UsuarioManager();

		
		$usuario->nomUsuarioGpsgate = $_REQUEST['usuarioGPSGate'];
		$usuario->dscNomUsuario = $_REQUEST['nome'];
		$usuario->dscEmailUsuario = $_REQUEST['email'];
		$usuario->dscSenhaUsuario = $_REQUEST['senha'];
		$usuario->dscEndereco = $_REQUEST['endereco'];
		$usuario->dscComplemento = $_REQUEST['complemento'];
		$usuario->dscCep = $_REQUEST['cep'];
		$usuario->dscUf = $_REQUEST['estado'];
		$usuario->dscCidade = $_REQUEST['cidade'];
		$usuario->numTelefone = $_REQUEST['fone'];
		$usuario->numFoneCelular = $_REQUEST['celular'];
		$usuario->codCpfCnpj = $_REQUEST['cpfCnpj'];
		$usuario->datNascimento = $_REQUEST['dataNascimento'];
		$usuario->staAdmin = $_REQUEST['admin'];
		$usuario->dscPais = $_REQUEST['pais'];
		
		$usuario->seqUsuario = $_REQUEST['seqUsuario']; 
		
		$usuarioManager->update($usuario);
		
		
		echo "<script>window.location = '../admin/alterarUsuario.php?seqUsuario=".$usuario->seqUsuario."&sta=success';</script>";
		
		} catch(Exception $e) {
			echo "<script>window.location = '../admin/alterarUsuario.php?seqUsuario=".$usuario->seqUsuario."&sta=error';</script>";
		}
			
	
	break;

}





?>
