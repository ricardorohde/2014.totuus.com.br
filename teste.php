<?php

require_once ("aplicacao/classes/br.com.totuus/Encrypt.php");

$encrypt = new Encrypt();

echo $encrypt->criptografar('011951');

//echo $encrypt->decriptografar('bG5RPA3uMRtRBsmTEk2c1w==');

?>