<?php 
	session_start();
	require_once("classes/br.com.totuus/UsuarioManager.php");
	require_once("classes/br.com.totuus/Encrypt.php");
	
	$usuarioManager = new UsuarioManager();
	$usuario = $usuarioManager->findById($_SESSION["idUsuario"]);
	
	$encrypt = new Encrypt();
?>
<body>
   <form action="http://totuus.server93.com/Login.aspx" method="post" id="formLoginGpsGate">
	   <table>
		   <tr>
			   <td>
				   <input type="hidden" name="inUsername" value="<?=$usuario->nomUsuarioGpsgate;?>"/>
			   </td>
			   <td>
				   <input type="hidden" name="inPassword" value="<?=$encrypt->decriptografar($usuario->dscSenhaUsuario);?>"/>
			   </td>
			   
		   </tr>
	   </table>
   </form>
   <script>
   	document.getElementById('formLoginGpsGate').submit();
   </script>
</body>
