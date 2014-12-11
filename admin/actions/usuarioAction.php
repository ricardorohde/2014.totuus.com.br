<?php 

session_start();


$method =  $_REQUEST['method'];

require_once ("../classes/NotificacaoManager.php");
require_once ("../classes/UsuarioManager.php");
require_once ("../classes/Encrypt.php");

$usuarioManager = new UsuarioManager();
$encrypt = new Encrypt();

switch ($method) {
	
	case "getListaUsuarios" :
		
		$usuarios = $usuarioManager->findAll();
						
		while($usuario = mysql_fetch_array($usuarios))
		{
			echo "<tr><td class='description'>" .utf8_encode($usuario['dsc_nom_usuario']). "</td><td class='value'>" . $usuario['dsc_email_usuario']."</td><td class='value' align='center'><a href='#' class='btn btn-default' onclick='prepararAlterarUsuario(" .$usuario['seq_usuario'].");' >Alterar</a><a href='#' class='btn btn-default' onclick='confirmaExcluirUsuario(".$usuario['seq_usuario'].");'>Exlcuir</a></td>/tr>";
		}	
	
	break;
	
	case "getQtdUsuarios" :
	
		$usuarios = $usuarioManager->countUsuarios();
						
		while($usuario = mysql_fetch_array($usuarios))
		{
			echo "<div class='stat'><h4>Usu&aacute;rios administradores</h4><span class='value'>" .$usuario["usu_admin"] . "</span></div><div class='stat'><h4>Usu&aacute;rios de aplica&ccedil;&atilde;o</h4><span class='value'>" . $usuario["usu_app"] . "</span></div>";
		}	
	
	break;
	
	case "inserirUsuario" :
	
		
		$usuario = new Usuario();
		
		$usuario->nomUsuarioGpsgate = $_REQUEST['nomUsuarioGpsgate'];   
		$usuario->dscNomUsuario = utf8_decode($_REQUEST['dscNomUsuario']);  
		$usuario->dscEmailUsuario = $_REQUEST['dscEmailUsuario'];
		$usuario->dscSenhaUsuario = utf8_decode($encrypt->criptografar($_REQUEST['dscSenhaUsuario']));
		$usuario->dscEndereco = utf8_decode($_REQUEST['dscEndereco']);
		$usuario->dscComplemento = utf8_decode($_REQUEST['dscComplemento']);
		$usuario->dscCep = $_REQUEST['dscCep'];
		$usuario->dscUf = $_REQUEST['dscUf'];
		$usuario->dscCidade = utf8_decode($_REQUEST['dscCidade']);
		$usuario->numTelefone = $_REQUEST['numTelefone'];
		$usuario->numFoneCelular = $_REQUEST['numFoneCelular'];
		$usuario->codCpfCnpj = $_REQUEST['codCpfCnpj'];
		$usuario->datNascimento = $_REQUEST['datNascimento'];
		$usuario->staAdmin = $_REQUEST['staAdmin'];
		$usuario->numAppGpsgate = 0;
		if($_REQUEST['numAppGpsgate'] != NULL && $_REQUEST['numAppGpsgate'] != "")
			$usuario->numAppGpsgate = $_REQUEST['numAppGpsgate'];
		
		$usuarios = $usuarioManager->save($usuario);
						
		$notificacaoManager = new NotificacaoManager();
		
		$notificacaoManager->gerarNotificacoes(utf8_decode("Novo usuário incluído"),utf8_decode("Usuário ".$_REQUEST['dscNomUsuario']. " incluído em nossa base de dados."));	
		
	break;
	
	case "selecionarUsuarioPorId" :
	
		$usuario = new Usuario();
		
		$usuario = $usuarioManager->findById($_REQUEST['seqUsuario']);
		
		echo "<usuario>" .
				"<seqUsuario>".$usuario->seqUsuario."</seqUsuario>".
				"<nomUsuarioGpsgate>".$usuario->nomUsuarioGpsgate."</nomUsuarioGpsgate>".
				"<dscNomUsuario>".utf8_encode($usuario->dscNomUsuario)."</dscNomUsuario>".
				"<dscEmailUsuario>".$usuario->dscEmailUsuario."</dscEmailUsuario>".
				"<dscSenhaUsuario>".utf8_encode($encrypt->decriptografar($usuario->dscSenhaUsuario))."</dscSenhaUsuario>".
				"<dscEndereco>".utf8_encode($usuario->dscEndereco) ."</dscEndereco>".
				"<dscComplemento>".utf8_encode($usuario->dscComplemento)."</dscComplemento>".
				"<dscCep>".$usuario->dscCep."</dscCep>".
				"<dscUf>".$usuario->dscUf."</dscUf>".
				"<dscCidade>".utf8_encode($usuario->dscCidade)."</dscCidade>".
				"<numTelefone>".$usuario->numTelefone."</numTelefone>".
				"<numFoneCelular>".$usuario->numFoneCelular."</numFoneCelular>".
				"<codCpfCnpj>".$usuario->codCpfCnpj."</codCpfCnpj>".
				"<datNascimento>".$usuario->datNascimento."</datNascimento>".
				"<staAdmin>".$usuario->staAdmin."</staAdmin>".
				"<numAppGpsgate>".$usuario->numAppGpsgate."</numAppGpsgate>".
			 "</usuario>";
		
	break;
	
	case "atualizarUsuario" :
	
		
		$usuario = new Usuario();
		
		$usuario->nomUsuarioGpsgate = $_REQUEST['nomUsuarioGpsgate'];   
		$usuario->dscNomUsuario = utf8_decode($_REQUEST['dscNomUsuario']);  
		$usuario->dscEmailUsuario = $_REQUEST['dscEmailUsuario'];
		$usuario->dscSenhaUsuario = utf8_decode($encrypt->criptografar($_REQUEST['dscSenhaUsuario']));
		$usuario->dscEndereco = utf8_decode($_REQUEST['dscEndereco']);
		$usuario->dscComplemento = utf8_decode($_REQUEST['dscComplemento']);
		$usuario->dscCep = $_REQUEST['dscCep'];
		$usuario->dscUf = $_REQUEST['dscUf'];
		$usuario->dscCidade = utf8_decode($_REQUEST['dscCidade']);
		$usuario->numTelefone = $_REQUEST['numTelefone'];
		$usuario->numFoneCelular = $_REQUEST['numFoneCelular'];
		$usuario->codCpfCnpj = $_REQUEST['codCpfCnpj'];
		$usuario->datNascimento = $_REQUEST['datNascimento'];
		$usuario->staAdmin = $_REQUEST['staAdmin'];
		$usuario->numAppGpsgate = 0;
		if($_REQUEST['numAppGpsgate'] != NULL && $_REQUEST['numAppGpsgate'] != "")
			$usuario->numAppGpsgate = $_REQUEST['numAppGpsgate'];
		$usuario->seqUsuario = $_REQUEST['seqUsuario'];
		
		$usuarios = $usuarioManager->update($usuario);
						
	
	break;
	
	case "excluirUsuario" :
	
		$usuario = $usuarioManager->findById($_REQUEST['seqUsuario']);
	
		$nomeUsuario = $usuario->dscNomeUsuario;
	
		$usuarioManager->delete($_REQUEST['seqUsuario']);
	
		$notificacaoManager = new NotificacaoManager();
		
		$notificacaoManager->gerarNotificacoes(utf8_decode("Usuário excluído"),utf8_decode("Usuário ".$nomeUsuario. " foi excluído da nossa base de dados."));
	
	break;
	
	case "rotinasAjuste" :
		
		$usuarios = $usuarioManager->findAll();
						
		while($usuario = mysql_fetch_array($usuarios))
		{
			$usuarioManager->executeQuery("update usuario set dsc_senha_usuario = '".utf8_decode($encrypt->criptografar($usuario['dsc_senha_usuario']))."' where seq_usuario = ".$usuario['seq_usuario']); 
		}
		
	break;
	
}

?>
