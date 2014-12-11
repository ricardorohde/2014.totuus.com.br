<?php 

require_once ("GenericManager.php");

class UsuarioContrato {  
 
 	public $seqUsuario;
	public $seqContrato;

}

class UsuarioContratoManager extends GenericManager {

	public function save($usuarioContrato) {

		$query = "INSERT INTO usuario_contrato (seq_usuario, seq_contrato) VALUES (".$usuarioContrato->seqUsuario.", ".$usuarioContrato->seqContrato.")";

		return $this->executeQuery($query);

	}
/*
	public function delete($idUsuarioContrato) {

		$query = "DELETE FROM usuario_contrato WHERE  = ".$idUsuarioContrato;

		return $this->executeQuery($query);

 	}

	public function update($usuarioContrato) {

		$query = "UPDATE usuario_contrato SET ".  
   "seq_usuario = ".$usuarioContrato->seqUsuario.", ". 
 "seq_contrato = ".$usuarioContrato->seqContrato. WHERE  = ".$usuarioContrato-> ;

		return $this->executeQuery($query);

	}
	

	public function findById($idUsuarioContrato) {

		$query = "SELECT * FROM usuario_contrato WHERE  = ".$idUsuarioContrato;

		$result = $this->executeQuery($query);

		$usuarioContrato = new UsuarioContrato();

		while($item = mysql_fetch_array($result)) 
		{
			$usuarioContrato->seqUsuario = $item['seq_usuario'];   
			$usuarioContrato->seqContrato = $item['seq_contrato'];   
		}

		return $usuarioContrato;

	}
*/
	public function findAll() {

		$query = "SELECT * FROM usuario_contrato";

		return $this->executeQuery($query);

	}

}

?>