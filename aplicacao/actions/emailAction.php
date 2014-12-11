<?php

$method = $_REQUEST['method'];

switch ($method) {

	case "enviar" :
	
	
		try {
			
			$nome = $_REQUEST['nome'];
			$email = $_REQUEST['email']; 
			$fone = $_REQUEST['fone'];
			$cidade = $_REQUEST['cidade'];
			$estado = $_REQUEST['estado'];
			$assunto = $_REQUEST['assunto'];
			$mensagem = $_REQUEST['mensagem'];
			
			
			/*
			
			$nome = "Thales Freire";
			$email = "thalesfreire@gmail.com"; 
			$fone = "";
			$cidade = "Fortaleza";
			$estado = "CE";
			$assunto = "Monitoramento veicular";
			$mensagem = "Gostaria de saber como contratar o serviço para os carros da minha família";
			*/
			
			$corpo = "De: " . $nome . " <" . $email . ">\n";
			if($fone != "")
				$corpo.= "Fone: " . $fone . "\n\n";
			
			$corpo .= $mensagem . "\n\n\n"; 
			$corpo .= $cidade . " - " . $estado . "\n"; 
			$corpo .= date("d/m/y");
		
		
			mail("thales@totuus.com.br","Contato via WEB - ".$assunto, $corpo,"From: ".$nome." <".$email.">");
			 
			echo "<?xml version='1.0' encoding='utf-8' ?>\n<retorno>\n<codigo>true</codigo>\n<msg>Mensagem envida com sucesso.</msg>\n</retorno>";
		} catch (Exception $e) {
			echo "<?xml version='1.0' encoding='utf-8' ?>\n<retorno>\n<codigo>false</codigo>\n<msg>Desculpe o inconveniente. Houve um erro no envio da sua mensagem. Verifique os dados e envie novamente.</msg>\n</retorno>";
		}
	
		
	break;

}





?>
