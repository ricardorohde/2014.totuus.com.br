<?php 

require_once ("GenericManager.php");

class Servico {  
 
 	public $seqServico;
	public $dscServico;

}

class ServicoManager extends GenericManager {

	public function save($servico) {

		$query = "INSERT INTO servico (dsc_servico) VALUES ('".$servico->dscServico."')";

		return $this->executeQuery($query);

	}

	public function delete($idServico) {

		$query = "DELETE FROM servico WHERE seq_servico = ".$idServico;

		return $this->executeQuery($query);

 	}

	public function update($servico) {

		$query = "UPDATE servico SET ".  
   " dsc_servico = '".$servico->dscServico."' WHERE seq_servico = ".$servico->seqServico ;

		return $this->executeQuery($query);

	}

	public function findById($idServico) {

		$query = "SELECT * FROM servico WHERE seq_servico = ".$idServico;

		$result = $this->executeQuery($query);

		$servico = new Servico();

		while($item = mysql_fetch_array($result)) 
		{
			$servico->seqServico = $item['seq_servico'];   
			$servico->dscServico = $item['dsc_servico'];   
		}

		return $servico;

	}
	
	public function findByUsuario($idUsuario) {

		$query = " SELECT s.seq_servico, s.dsc_servico, cs.dsc_url_servico ".
				 " FROM servico s, contrato_servico cs, usuario_contrato uc, usuario u ".
				 " WHERE s.seq_servico = cs.seq_servico ".
				 " AND uc.seq_usuario = u.seq_usuario ".
				 " AND cs.seq_contrato = uc.seq_contrato ". 
                 " AND uc.seq_usuario = ".$idUsuario;

		return $this->executeQuery($query);

	}

	public function findAll() {

		$query = "SELECT * FROM servico";

		return $this->executeQuery($query);

	}

}

?>