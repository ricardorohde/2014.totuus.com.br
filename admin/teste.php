<?
require_once ("classes/UsuarioManager.php");

require_once ("classes/Encrypt.php");

$encrypt = new Encrypt();

echo "Criando cripto: ".$encrypt->criptografar("011951") ;


echo "<br />";

echo "Criando cripto decode: ".utf8_decode($encrypt->criptografar("011951"));


echo "<br />";


echo "Abrindo senha: ".$encrypt->decriptografar("m4tt/UOssQg=") ;


//echo "aqui:". $encrypt->decriptografar("imFSH7dV30w=");

?>

<!--

<form>
	
	<input type="text" id="nom_usuario_gpsgate" name="nom_usuario_gpsgate"/>
	<input type="text" id="dsc_nom_usuario" name="dsc_nom_usuario"/>
	
</form>

<script>
	
	var cliente = {"nom_usuario_gpsgate":"hyv7883","dsc_nom_usuario":"Thales Freire"};
	
	fillForm(cliente);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function fillForm(jsonForm){
		for(var i=0; i <  Object.keys(jsonForm).length; i++){
			document.getElementById(Object.keys(jsonForm)[i].toString()).value = cliente[Object.keys(jsonForm)[i]];
		}
	}
	
	
</script>

-->